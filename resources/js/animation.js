window.openModalModify = function (open = true, profile = null) {
  const modal = document.getElementById('modal-modify')
  if (!modal) return

  if (open) {
    modal.classList.remove('hidden')
    modal.classList.add('flex')

    document.getElementById('name').value = profile.nombre
    document.getElementById('ciudad').value = profile.ciudad
    document.getElementById('email').value = profile.email
    document.getElementById('email_recuperacion').value = profile.email_recuperacion
    document.getElementById('password_recuperacion').value = profile.password_recuperacion
    document.getElementById('password').value = profile.password
    document.getElementById('clave_2fa').value = profile.clave_2fa
    document.getElementById('fecha_creacion').value = dmyToYmd(profile.fecha_creacion)
    document.getElementById('fecha_modificacion').value = dmyToYmd(profile.fecha_modificacion)
    document.getElementById('fecha_adquisicion').value = dmyToYmd(profile.fecha_adquisicion)
    document.getElementById('estado').value = profile.estado
    document.getElementById('proveedor').value = profile.proveedor
    document.getElementById('ciudad_imagenes').value = profile.ciudad_imagenes

    // ✅ ahora sí correcto
    addingLevel('modify', profile.level)
  } else {
    modal.classList.add('hidden')
    modal.classList.remove('flex')
  }
}


window.openModalCreate = function (open = true) {
  const modal = document.getElementById('modal-create')
  if (!modal) return

  if (open) {
    modal.classList.remove('hidden')
    modal.classList.add('flex')

    // opcional: poner level inicial
    addingLevel('create', 1)
  } else {
    modal.classList.add('hidden')
    modal.classList.remove('flex')
  }
}

window.openModalView = function (open = true, profile = null) {
  const modal = document.getElementById('modal-view')
  if (!modal) return

  if (open) {
    modal.classList.remove('hidden')
    modal.classList.add('flex')

    if (!profile) return

    // set text
    setText('view_nombre', profile.nombre)
    setText('view_ciudad', profile.ciudad)
    setText('view_email', profile.email)
    setText('view_proveedor', profile.proveedor)

    setText('view_email_recuperacion', profile.email_recuperacion)
    setText('view_password_recuperacion', profile.password_recuperacion)

    setText('view_password', profile.password)
    setText('view_clave_2fa', profile.clave_2fa)

    setText('view_fecha_creacion', profile.fecha_creacion)
    setText('view_fecha_modificacion', profile.fecha_modificacion)
    setText('view_fecha_adquisicion', profile.fecha_adquisicion)
    setText('view_estado', profile.estado)

    setText('view_ciudad_imagenes', profile.lugar_imagen)

    // level color
    addingLevel('view', profile.level)

  } else {
    modal.classList.add('hidden')
    modal.classList.remove('flex')
  }
}

function setText(id, value) {
  const el = document.getElementById(id)
  if (!el) return
  el.textContent = value ?? '—'
}

window.copyField = async function (id) {
  const el = document.getElementById(id)
  if (!el) return

  const text = (el.textContent || '').trim()
  if (!text || text === '—') return

  try {
    await navigator.clipboard.writeText(text)

    const msg = document.getElementById(id + '_copied')
    if (msg) {
      msg.classList.remove('hidden')
      setTimeout(() => msg.classList.add('hidden'), 900)
    }
  } catch (e) {
    console.error('Clipboard error:', e)
  }
}


function dmyToYmd(dmy) {
  // "24/04/2024" -> "2024-04-24"
  if (!dmy || typeof dmy !== 'string') return ''

  const [d, m, y] = dmy.split('/')
  if (!d || !m || !y) return ''

  return `${y}-${m}-${d}`
}

function clamp(n, min, max) {
  return Math.max(min, Math.min(max, n))
}

function addingLevel(prefix, level) {
  const levelStyles = {
    1:  'bg-indigo-100 text-indigo-700 ring-indigo-200',
    2:  'bg-blue-100 text-blue-700 ring-blue-200',
    3:  'bg-cyan-100 text-cyan-700 ring-cyan-200',
    4:  'bg-emerald-100 text-emerald-700 ring-emerald-200',
    5:  'bg-green-100 text-green-700 ring-green-200',
    6:  'bg-lime-100 text-lime-700 ring-lime-200',
    7:  'bg-amber-100 text-amber-700 ring-amber-200',
    8:  'bg-orange-100 text-orange-700 ring-orange-200',
    9:  'bg-rose-100 text-rose-700 ring-rose-200',
    10: 'bg-fuchsia-100 text-fuchsia-700 ring-fuchsia-200',
  }

  level = Math.max(1, Math.min(10, parseInt(level || 1)))
  const style = levelStyles[level] ?? levelStyles[1]

  const el = document.getElementById(`${prefix}-class-level`)
  const number = document.getElementById(`${prefix}-level`)
  const input = document.getElementById(`${prefix}-level-input`)

  if (!el || !number || !input) return

  Object.values(levelStyles).forEach(cls => el.classList.remove(...cls.split(' ')))
  el.classList.add(...style.split(' '))

  number.textContent = level
  input.value = level
}


// listeners una sola vez
function initLevel(prefix, startLevel = 1) {
  const btnDown = document.getElementById(`${prefix}-btn-level-down`)
  const btnUp   = document.getElementById(`${prefix}-btn-level-up`)
  const input   = document.getElementById(`${prefix}-level-input`)

  // si el widget no existe, salir
  if (!input) return

  // inicializar estilos y valor
  if (!input.value) input.value = startLevel
  addingLevel(prefix, input.value)

  // si hay botones, asignar eventos
  btnDown?.addEventListener('click', () => {
    addingLevel(prefix, parseInt(input.value) - 1)
  })

  btnUp?.addEventListener('click', () => {
    addingLevel(prefix, parseInt(input.value) + 1)
  })
}

document.addEventListener('DOMContentLoaded', () => {
  initLevel('modify', 1)
  initLevel('create', 1)
})



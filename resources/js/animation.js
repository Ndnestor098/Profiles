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

        addingLevel(profile.level)
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
  } else {
    modal.classList.add('hidden')
    modal.classList.remove('flex')
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

function addingLevel(level) {
  const levelStyles = {
    1  : 'bg-indigo-100 text-indigo-700 ring-indigo-200',
    2  : 'bg-blue-100 text-blue-700 ring-blue-200',
    3  : 'bg-cyan-100 text-cyan-700 ring-cyan-200',
    4  : 'bg-emerald-100 text-emerald-700 ring-emerald-200',
    5  : 'bg-green-100 text-green-700 ring-green-200',
    6  : 'bg-lime-100 text-lime-700 ring-lime-200',
    7  : 'bg-amber-100 text-amber-700 ring-amber-200',
    8  : 'bg-orange-100 text-orange-700 ring-orange-200',
    9  : 'bg-rose-100 text-rose-700 ring-rose-200',
    10 : 'bg-fuchsia-100 text-fuchsia-700 ring-fuchsia-200',
  }

  level = clamp(parseInt(level || 1), 1, 10)

  const style = levelStyles[level] ?? levelStyles[1]
  const el = document.getElementById('class-level')
  const number = document.getElementById('level')
  const input = document.getElementById('level-input')

  if (!el || !number || !input) return

  // limpiar clases anteriores
  Object.values(levelStyles).forEach(cls => {
    el.classList.remove(...cls.split(' '))
  })

  // agregar clases nuevas
  el.classList.add(...style.split(' '))

  // actualizar número + input
  number.textContent = level
  input.value = level

  // opcional: deshabilitar botones en extremos
  const btnDown = document.getElementById('btn-level-down')
  const btnUp = document.getElementById('btn-level-up')

  if (btnDown) {
    btnDown.disabled = level <= 1
    btnDown.classList.toggle('opacity-40', level <= 1)
    btnDown.classList.toggle('cursor-not-allowed', level <= 1)
    btnDown.classList.toggle('cursor-pointer', level > 1)
  } 
  if (btnUp) {
    btnUp.disabled = level >= 10
    btnUp.classList.toggle('opacity-40', level >= 10)
    btnUp.classList.toggle('cursor-not-allowed', level >= 10)
    btnUp.classList.toggle('cursor-pointer', level < 10)
  }
}

// listeners una sola vez
document.addEventListener('DOMContentLoaded', () => {
  const btnDown = document.getElementById('btn-level-down')
  const btnUp = document.getElementById('btn-level-up')
  const input = document.getElementById('level-input')

  if (!input) return

  // iniciar estilo
  addingLevel(input.value)

  btnDown?.addEventListener('click', () => {
    addingLevel(parseInt(input.value) - 1)
  })

  btnUp?.addEventListener('click', () => {
    addingLevel(parseInt(input.value) + 1)
  })
})


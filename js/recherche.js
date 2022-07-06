let searchInput = document.querySelector('.input-box input')

let rows = document.querySelectorAll('tbody tr')

searchInput.addEventListener('keyup', e => {
	let search = e.target.value.toLowerCase()

	rows.forEach(row => {
		let text = row.innerText.toLowerCase()

		if (!text.includes(search)) {
			row.style.display = 'none'
		} else {
			row.style.display = ''
		}
	})
})

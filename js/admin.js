let tabs = document.querySelectorAll('.tab')
let contents = document.querySelectorAll('.tab-content')

tabs.forEach(tab => {
	tab.addEventListener('click', () => {
		let id = tab.dataset.id

		tabs.forEach(tab => {
			tab.classList.remove('active')
		})

		tab.classList.add('active')

		contents.forEach(content => {
			if (content.dataset.id == id) {
				content.classList.add('active')
			} else {
				content.classList.remove('active')
			}
		})
	})
})

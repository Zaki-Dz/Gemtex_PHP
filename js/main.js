let header = document.querySelector('header')
let topBtn = document.querySelector('.top-btn')

window.addEventListener('scroll', () => {
	if (window.scrollY >= window.innerHeight) {
		header.style.position = 'fixed'
		topBtn.classList.add('active')
	} else {
		header.style.position = ''
		topBtn.classList.remove('active')
	}
})

topBtn.addEventListener('click', () => {
	window.scroll(0, 0)
})

let navBtn = document.querySelector('.nav-btn')
let nav = document.querySelector('nav')

window.addEventListener('click', e => {
	e.stopPropagation()
	if (e.target == navBtn) {
		nav.classList.add('active')
	} else {
		nav.classList.remove('active')
	}
})

let categories = document.querySelectorAll('.category')
let products = document.querySelectorAll('.produit')

categories.forEach(category => {
	category.addEventListener('click', () => {
		categories.forEach(cat => {
			cat.classList.remove('active')
		})

		category.classList.add('active')
		let categoryData = category.dataset.category

		products.forEach(product => {
			if (categoryData == 'all') {
				product.classList.remove('hide')
			} else {
				if (product.dataset.category == categoryData) {
					product.classList.remove('hide')
				} else {
					product.classList.add('hide')
				}
			}
		})
	})
})

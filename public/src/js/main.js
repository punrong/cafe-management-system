const NUM_PER_PAGE = 10;
const COFFEE = 'COFFEE';
const TEA = 'TEA';

const Model = (function() {
	const data = [
		{
			id: 1,
			name: 'Five RemG',
			price: 2,
			type: COFFEE,
			src: './src/img/showcase.jpg'
		},
		{
			id: 2,
			name: 'Rem',
			price: 5,
			type: TEA,
			src: './src/img/maid.jpeg'
		},
		{
			id: 3,
			name: 'Ichimaru Gin',
			price: 7.99,
			type: COFFEE,
			src: './src/img/showcase.jpg'
		},
		{
			id: 4,
			name: 'Chitanda Eru',
			price: 3.99,
			type: TEA,
			src: './src/img/maid.jpeg'
		}
	];
	return {
		data
	};
})();

const View = (function() {
	function createMenuItem({ name, price, src }) {
		const smallFont = name.length > 20 ? 1.5 : 1.75;
		return `
        <div class="col-lg-4 col-md-6 menu-item">
            <div class="menu-item-content box-shadow">
                <div class="menu-item-img" style="background-image: url(${src});"></div>
                <div class="menu-item-text">
					<h3 style="font-size: ${smallFont}rem;">${name}</h3>
					<span>Price: ${price}$</span>
                </div>
            </div>
        </div>
        `;
	}

	function addMenuItem(menuItem) {
		document.querySelector('.js_menu-content').insertAdjacentHTML('beforeend', createMenuItem(menuItem));
	}

	function renderPageNumber(menuItems, curPage) {
		document.querySelector('.page-number').innerHTML = '';

		const totalPage = Math.ceil(menuItems.length / NUM_PER_PAGE);
		let html = '';

		for (let i = 0; i < totalPage; i++) {
			html += `
			<a class="js_a-pageNumber" id="p-${i + 1}" href="#menu">${i + 1}</a>
			`;
		}
		document.querySelector('.page-number').insertAdjacentHTML('beforeend', html);
		document.querySelector(`#p-${curPage}`).classList.toggle('active-page');
	}

	function renderMenu(menuItems, type = 'ALL', curPage = 1) {
		document.querySelector('.js_menu-content').innerHTML = '';

		if (menuItems.length === 0) {
			document.querySelector('.js_menu-content').insertAdjacentHTML('beforeend', `<h3>No Item to Show</h3>`);
			return;
		}

		let newMenuItems;
		if (type !== 'ALL') {
			newMenuItems = menuItems.filter((menuItem) => menuItem.type === type);
		} else {
			newMenuItems = menuItems;
		}

		newMenuItems.slice(curPage * NUM_PER_PAGE - NUM_PER_PAGE, curPage * NUM_PER_PAGE).forEach((item) => {
			addMenuItem(item);
		});

		renderPageNumber(newMenuItems, curPage);
	}

	return {
		renderMenu
	};
})();

const Controller = (function(Model, View) {
	let Current_Type = 'ALL';

	document.querySelector('.js_menu-bar-all').addEventListener('click', (e) => {
		View.renderMenu(Model.data, (Current_Type = 'ALL'));
	});

	document.querySelector('.js_menu-bar-coffee').addEventListener('click', (e) => {
		View.renderMenu(Model.data, (Current_Type = COFFEE));
	});

	document.querySelector('.js_menu-bar-tea').addEventListener('click', (e) => {
		View.renderMenu(Model.data, (Current_Type = TEA));
	});

	document.querySelector('.js_input-search').addEventListener('keyup', (e) => {
		const items = Model.data
			// .filter((d) => d.type === Current_Type)
			.filter((d) => d.name.toLowerCase().includes(e.target.value.toLowerCase()));
		View.renderMenu(items);
	});

	document.querySelector('.page-number').addEventListener('click', (e) => {
		if (e.target.classList.contains('js_a-pageNumber')) {
			const pageNum = parseInt(e.target.id.split('-')[1]);
			View.renderMenu(Model.data, Current_Type, pageNum);
		}
	});

	function EXECUTE() {
		View.renderMenu(Model.data);
	}

	return {
		EXECUTE
	};
})(Model, View);

Controller.EXECUTE();

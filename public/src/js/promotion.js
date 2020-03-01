const NUM_PER_PAGE = 10;
const COFFEE = 'COFFEE';
const TEA = 'TEA';

const Model = (function() {
	let data = [];

	return {
		data
	};
})();

const View = (function() {
	function createMenuItem({ id, name, img, startDate, endDate }) {
		const smallFont = name.length > 20 ? 1.5 : 1.75;
		return `
        <div class="col-lg-4 col-md-6 menu-item">
		<div class="menu-item-content box-shadow">
			<div class="menu-item-img" style="background-image: url('../image/${img}');"></div>
			<div class="menu-item-text">
					<h3 style="font-size: ${smallFont}rem;">${name}</h3>
					<span>Start Date: ${startDate}</span>
					<span>End Date: ${endDate}</span>
				</div>
				<hr>
				<div class="centeralize">
				<button id="${id}" type="button" class="btn btn-primary js_promotion-info" data-toggle="modal" data-target="#promotion-info">
        			Read More
				</button>
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
		
		let newMenuItems;
		if (type !== 'ALL') {
			newMenuItems = menuItems.filter((menuItem) => menuItem.type === type);
		} else {
			newMenuItems = menuItems;
		}

		if (newMenuItems.length === 0) {
			document.querySelector('.js_menu-content').insertAdjacentHTML('beforeend', `<h3>No Item to Show</h3>`);
			return;
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

	function addEventToButton() {
		document.querySelectorAll('.js_promotion-info').forEach((btn) =>
			btn.addEventListener('click', (e) => {
				console.log(typeof Model.data[0].id);
				console.log(e.target.id);
				const data = Model.data.find((d) => d.id === e.target.id);
				document.querySelector('.js_promotion-info-title').innerHTML = data.name;
				document.querySelector('.js_promotion-info-body').innerHTML = data.condition;
			})
		);
	}

	function EXECUTE() {
		let data = [];
		const ajax = new XMLHttpRequest();
		const method = "GET";
		const url = "http://localhost:8000/promotion.php";
		const asynchronous = true;

		ajax.open(method, url, asynchronous);
		ajax.send();

		ajax.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				data = JSON.parse(this.responseText);
				Model.data = [...data];
				View.renderMenu(data);
				addEventToButton();
			}
		}
	}

	

	return {
		EXECUTE
	};
})(Model, View);

Controller.EXECUTE();

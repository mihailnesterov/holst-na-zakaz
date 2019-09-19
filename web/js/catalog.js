
	/*const cart = document.getElementById('cart');
	const cartCount = document.getElementById('cartCount');
	const cartSum = document.getElementById('cartSum');

	const buttons = document.querySelectorAll('.holst-card button');
	console.log(buttons);
    

    for(let i = 0; i<buttons.length;i++) {
        buttons[i].onclick = function(e) {
            cartCount.innerHTML = Number(cartCount.innerHTML) + 1;
            cartSum.innerHTML = buttons[i].closest('.holst-card').innerHTML;
        }
    }*/

    /*buttons[0].onclick = (e) => {
        
    }*/


// js-скрипт выбор размера
/*var s=0;

const f=5;
let g='asdsfs';

s = 69;*/
// JavaScript - нетипизированный
// TypeScript - типизированный JS

/**
    window
        document.getElementsByClassName
        document.getElementById
        document.querySelectorAll
    */


/*
const sizesItems = document.getElementsByClassName('module-order-calc-sizes-item');
for (let i = 0; i < sizesItems.length; i++) {
    sizesItems[i].onclick = (e) => {       
        e.preventDefault();
        for (let j = 0; j < sizesItems.length; j++) {
            sizesItems[j].classList.remove('uk-active');
        }
        e.target.classList.add('uk-active');
        const canvasSizesWoman = document.getElementById('img-canvas-sizes-woman');
            canvasSizesWoman.src = `images/canvas-sizes-woman/${i+1}.jpg`;
            canvasSizesWoman.alt = e.target.innerHTML;
        const inputHiddenSize = document.querySelector('input[name=size]');
            if(inputHiddenSize) { inputHiddenSize.value = e.target.innerHTML };
        const inputTypeNumber = document.querySelectorAll('input[type=number]');
            const width = sizesItems[i].textContent.split('×')[0];
            const height = sizesItems[i].textContent.split('×')[1];
            console.log(width + 'x' + height);
            inputTypeNumber[0].value = Number(width);
            inputTypeNumber[1].value = Number(height);
    }
}
sizesItems[0].classList.add('uk-active');

function getDefaultPrices() {
    const arrPrices = [0,0,0,0,0,0];
    const priceBase = document.getElementById('price-base').innerHTML;
        arrPrices[0] = Number(priceBase);
    const priceMaterials = document.querySelector('input[name=radio-materials]').value;
        arrPrices[1] = Number(priceMaterials);
    const priceBagetWidth = document.querySelector('input[name=radio-bagets-width]').value;
        arrPrices[2] = Number(priceBagetWidth);
    return arrPrices;
}

window.onload = () => {
    const defaultPrices = getDefaultPrices();
    document.getElementById('price-all').innerHTML = defaultPrices.toString();
    let sumPrices = 0;
    for (let i = 0; i < defaultPrices.length; i++) {
        sumPrices += Number(defaultPrices[i]);
    }
    document.getElementById('price-total').innerHTML = sumPrices;
}*/

/*new Vue({
    el: 'id',
    data: {
         переменные
    },
    methods: {
         методы-функции
    },
    computed: {
         методы...
    },
    mounted() {
         автозагрузка - методы, стартующие при загрузке
    }
});*/

const app = new Vue({
    el: '#poster-app',
    data: {
        posterPrices: {
            base: 0,
            size: 0,
            material: 0,
            podramnik: 0,
            services: 0,
            baguette: 0
        },
        isBaguettesSelected: false, // false or true Boolean
        cartHeader: 'Корзина',
        cartCount: 0,
        cartSum: 0,
    },
    methods: {
        buy(){
            this.cartCount++;
            this.cartSum += this.getTotalPrice;
            console.log('this.cartCount = ' + this.cartCount);
        },
        setBasePrice(id) {
            this.posterPrices.base = document.getElementById(id).value;
        },
        setDefaultPosterSize(active) {
            const sizes = document.getElementsByClassName('module-order-calc-sizes-item');
            const activeSize = sizes[active];

            for (let i = 0; i < sizes.length; i++) {
                sizes[i].classList.remove('uk-active');
            }
            activeSize.classList.add('uk-active');

            const imgWoman = document.getElementById('img-canvas-sizes-woman');
                imgWoman.src = `images/canvas-sizes-woman/${ (+activeSize.dataset.key+1)}.jpg`;

            const inputTypeNumber = document.querySelectorAll('input[type=number]');
            const width = activeSize.textContent.split('×')[0];
            const height = activeSize.textContent.split('×')[1];
                inputTypeNumber[0].value = +width;  // преобразовать в целое число
                inputTypeNumber[1].value = Number(height);  // ...
        },
        setDefaultPrice(size) {
            this.posterPrices.base = document.getElementById('base-price').value;
            this.posterPrices.size = document.getElementsByClassName('module-order-calc-sizes-item')[size].dataset.price;
            this.posterPrices.material = document.querySelector('input[name=radio-materials]').value;
            this.posterPrices.podramnik = document.querySelector('input[name=radio-bagets-width]').value;
            this.posterPrices.services = 0;
            this.posterPrices.baguette = 0;
        },
        selectActiveTab(e) {
           // ... выбор активной вкладки
            console.log(e.target.closest('div').classList.value);
        },
        selectPosterSize(e) {
            const classList = e.target.classList.value;
            const sizes = document.getElementsByClassName(classList);
            for (let i = 0; i < sizes.length; i++) {
                sizes[i].classList.remove('uk-active');
            }
            e.target.classList.add('uk-active');
            this.posterPrices.size = e.target.dataset.price;
            
            const imgWoman = document.getElementById('img-canvas-sizes-woman');
                imgWoman.src = `images/canvas-sizes-woman/${ (+e.target.dataset.key+1)}.jpg`;
            
            const inputTypeNumber = document.querySelectorAll('input[type=number]');
            const width = e.target.textContent.split('×')[0];
            const height = e.target.textContent.split('×')[1];
                inputTypeNumber[0].value = +width;
                inputTypeNumber[1].value = +height;
        },
        toggleBaguettes() {
            this.isBaguettesSelected = !this.isBaguettesSelected;
            if(!this.isBaguettesSelected) this.posterPrices.baguette = 0;
        },
        selectBaguette(e) {
            const radio = e.target.closest('li').querySelector('input[type=radio]');
                radio.checked = true;
                this.posterPrices.baguette = radio.value;
        },
        selectAddService(e) {
            if(e.target.checked) {
                this.posterPrices.services += +e.target.value;
            } else {
                if( this.posterPrices.services !== 0 ) {
                    this.posterPrices.services -= +e.target.value;
                }
            }
        }
    },
    computed: {
        getTotalPrice() {
            let totalPrice = 0;
            for(price in this.posterPrices) {
                totalPrice += +this.posterPrices[price];
            }
            return totalPrice;
        }
    },
    mounted() {
        this.setBasePrice('base-price');
        this.setDefaultPosterSize(2);
        this.setDefaultPrice(2);
    }
});
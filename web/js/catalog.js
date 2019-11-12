const posterApp = document.getElementById('poster-app');

if (posterApp) {
    // Vue object for poster
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
}



// AJAX add to cart (site/addToCart action)
$('.add-to-cart-button').on('click', function(e) {
    e.preventDefault();
    const id = e.target.dataset.id;
    //console.log(e.target.dataset.id);
    $.ajax({
        url: 'site/add-to-cart',
        data: {id: id},
        type: 'GET',
        success: (res) => {
            if( !res ) console.log('(ajax) success but poster id=' + id + ' not found');
            $('#modal-add-to-cart .modal-body').html(res);
            $('#modal-add-to-cart').modal();
            //console.log(res);
        },
        error: (err) => {
            console.log('Error! add to cart false: ' + JSON.stringify(err));
        },
    });
});
const posterApp = document.getElementById('poster-app');

if (posterApp) {
    // Vue object for poster
    const app = new Vue({
        el: '#poster-app',
        data: {
            posterPrices: {
                base: 0,    // базовая цена
                size: 0,    // стоимость за холст по размерам ( w, h )
                material: 0,    // цена за метериал
                podramnik: 0,   // цена за подрамник
                services: 0,    // цена за доп. услуги
                baguette: 0,    // цена за багет
                clock: 0,   // цена за часы
                module: 0,  // цена за модуль или ширму
            },
            fixPrices: {
                holder: 50,         // крепеж
                margin: 150,        // общая наценка
                podramnik: 550,     // подрамник  любой толщины (2,4)
                bagetWork: 350,     // цена за работу за багет
                promoCode: 0,       // промо-код - сумма скидки в руб.
            },
            isBaguettesSelected: false, // false / true выбран багет
            isClocksSelected: false, // false or true выбраны часы
            currTypeId: 1,
            currTypeName: 'Картина на холсте',
            currTypeDescription: '',
            currSize: '50x70',
            currMaterial: 'Холст натуральный',
            currPodramnik: 2,
            currServices: null,
            currBaget: null,
            currClocks: null,
            currModule: null,
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
                this.posterPrices.material = document.querySelector('input[name=radio-materials]').value;
                const item = document.getElementsByClassName('module-order-calc-sizes-item')[size];
                this.posterPrices.size = Math.ceil(((( parseInt(item.dataset.width) / 100 * parseInt(item.dataset.height) / 100) * this.posterPrices.material)));
                this.posterPrices.services = 0;
                this.posterPrices.baguette = 0;
                this.posterPrices.clock = 0;
                this.posterPrices.module = 0;
            },
            selectActiveTab(e) {
                // ... выбор активной вкладки
                const tab = e.target.closest('.module-order-calc-steps-item');
                const tabs = document.querySelectorAll('.module-order-calc-steps-item');
                if (tab.classList.contains('active')) {
                    tabs.forEach( el => {
                        if( el.classList.contains('active') ) {
                            el.classList.remove('active');
                        }
                    });
                } else {
                    tab.classList.add('active');
                }
            },
            selectNextTab(e) {
                // ... выбор следующей вкладки
                const tab = e.target.closest('.module-order-calc-steps-item');
                const tabs = document.querySelectorAll('.module-order-calc-steps-item');
                if (tab.classList.contains('active')) {
                    tabs.forEach( (el) => {
                        if( el.classList.contains('active') ) {
                            el.classList.remove('active');
                        }
                    });
                    tab.nextElementSibling.classList.add('active');
                }
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
                
                this.currSize = width + '×' + height;
            },
            selectMaterial(e) {
                e.target.checked = true;
                this.posterPrices.material = e.target.value;
                const item = document.querySelector('.module-order-calc-sizes-item.uk-active');
                this.posterPrices.size = Math.ceil(((( parseInt(item.dataset.width) / 100 * parseInt(item.dataset.height) / 100) * this.posterPrices.material)));
                this.currMaterial = e.target.dataset.name;
            },
            selectPodramnikWidth(e) {
                e.target.checked = true;
                this.currPodramnik = e.target.dataset.width;
            },
            toggleBaguettes() {
                this.isBaguettesSelected = !this.isBaguettesSelected;
                if(!this.isBaguettesSelected) {
                    this.posterPrices.baguette = 0;
                    this.currBaget = null;
                }
            },
            selectBaguette(e) {
                const radio = e.target.closest('li').querySelector('input[type=radio]');
                const data = e.target.closest('li').querySelector('.module-order-calc-baguettes-item-desc');

                radio.checked = true;
                this.posterPrices.baguette = radio.value;
                if ( this.isBaguettesSelected ) {
                    this.currBaget = 'артикул: ' + data.dataset.articul + ', ' + data.dataset.material + ', ' + data.dataset.width + ' см, ' + data.dataset.color;
                } else {
                    this.currBaget = null;
                }
                console.log(this.currBaget);
            },
            selectAddService(e) {
                const chk_boxes = document.querySelectorAll('input[type="checkbox"].checkbox-add-service');
                let all_checked_names = '';
                if(e.target.checked) {
                    this.posterPrices.services += +e.target.value;
                } else {
                    if( this.posterPrices.services !== 0 ) {
                        this.posterPrices.services -= +e.target.value;
                    }
                }
                for(let i=0; i<chk_boxes.length;i++) {
                    if (chk_boxes[i].checked) {
                        if(all_checked_names == '') {
                            all_checked_names = chk_boxes[i].dataset.serviceName;
                        } else {
                            all_checked_names += ', ' + chk_boxes[i].dataset.serviceName;
                        }
                    }
                }
                this.currServices = all_checked_names;
            },
            /*toggleClocks() {
                this.isClocksSelected = !this.isClocksSelected;
                if(!this.isClocksSelected) this.posterPrices.clock = 0;
            },*/
            selectClocks(e) {
                const radio = e.target.closest('li').querySelector('input[type=radio]');
                const img_block = document.querySelector('#poster-cover-type-module');
                    radio.checked = true;
                    this.posterPrices.clock = radio.value;
                    this.posterPrices.module = 0;
                    document.querySelector('#poster-cover-type-module img').setAttribute('src', e.target.src);
                    if (!img_block.classList.contains('poster-clocks-cover')) {
                        img_block.classList.add('poster-clocks-cover');
                    }
                this.currClocks = e.target.closest('li').dataset.name;
                this.currModule = null;
            },
            moveClocks(e) { // move clocks by mouse
                // not used!!! need fix
                //@mousedown="moveClocks"
                const clocks = e.target.closest('div');
                
                let coords = getCoords(clocks);
                let shiftX = e.pageX - coords.left;
                let shiftY = e.pageY - coords.top;

                //clocks.style.position = 'absolute';
                document.body.appendChild(clocks);
                moveAt(e);

                clocks.style.zIndex = 999;

                function moveAt(e) {
                    clocks.style.left = e.pageX - shiftX + 'px';
                    clocks.style.top = e.pageY - shiftY + 'px';
                }

                document.onmousemove = function(e) {
                    moveAt(e);
                };

                clocks.onmouseup = function() {
                    document.onmousemove = null;
                    clocks.onmouseup = null;
                };

                clocks.ondragstart = function() {
                return false;
                };

                function getCoords(elem) {   // кроме IE8-
                    var box = elem.getBoundingClientRect();
                    return {
                        top: box.top + pageYOffset,
                        left: box.left + pageXOffset
                    };
                }
            },
            showModuleByTypeId(e) {
                const type_id = parseInt(e.target.dataset.typeId);
                const type_name = e.target.dataset.typeName;
                const type_description = e.target.closest('div').querySelector('.uk-hidden.type-description').textContent;
                const img_block = document.querySelector('#poster-cover-type-module');
                
                this.currTypeId = type_id;
                this.currTypeName = type_name;
                this.currTypeDescription = type_description;

                if (img_block.classList.contains('poster-clocks-cover')) {
                    img_block.classList.remove('poster-clocks-cover');
                }
                document.querySelector('#poster-cover-type-module img').setAttribute('src', '');
                if( type_id === 5 ) {
                    this.isClocksSelected = true;
                    this.posterPrices.module = 0;
                } else if ( type_id === 1 ) {
                    this.isClocksSelected = false;
                    this.posterPrices.clock = 0;
                    this.posterPrices.module = 0;
                }
                else if ( type_id === 2 ) {
                    this.isClocksSelected = false;
                    this.posterPrices.clock = 0;
                }
                else {
                    this.isClocksSelected = false;
                    this.posterPrices.clock = 0;
                    this.posterPrices.module = 0;
                }
                
            },
            selectModule(e) {
                this.posterPrices.module = e.target.dataset.price;
                document.querySelector('#poster-cover-type-module img').setAttribute('src', e.target.dataset.src);
                this.currModule = e.target.closest('li').dataset.id;
                this.currClocks = null;
            },
            clearActiveTabs() {
                const tabs = document.querySelectorAll('.module-order-calc-steps-item');
                tabs.forEach( el => {
                    if( el.classList.contains('active') ) {
                        el.classList.remove('active');
                    }
                });
                tabs[0].classList.add('active');
            },
        },
        computed: {
            getTotalPrice() {
                let totalPrice = 0;
                for(price in this.posterPrices) {
                    totalPrice += +this.posterPrices[price];
                }
                for(fix in this.fixPrices) {
                    if (this.fixPrices[fix] === 'promoCode') {
                        totalPrice -= +this.fixPrices[fix];
                    } else if (this.fixPrices[fix] === 'bagetWork') {
                        if (currBaget !== null ) {
                            totalPrice += +this.fixPrices[fix];
                        } else {
                            totalPrice += 0;
                        }
                    } else {
                        totalPrice += +this.fixPrices[fix];
                    } 
                }
                return totalPrice;
            },
            /*getPosterTypeTooltip() {
                var sticky = UIkit.sticky('.uk-card', {
                    title: this.currTypeDescription !== '' ? this.currTypeDescription : '',
                    offset: 50,
                    top: 100
                });
            },*/
        },
        mounted() {
            this.setBasePrice('base-price');
            this.setDefaultPrice(2);
            this.setDefaultPosterSize(2);
            this.clearActiveTabs();
        }
    });
}



// AJAX add to cart (site/addToCart action)
$('.add-to-cart-button').on('click', function(e) {
    e.preventDefault();
    const id = e.target.dataset.id;
    $.ajax({
        url: 'site/add-to-cart',
        data: {id: id},
        type: 'GET',
        success: (res) => {
            if( !res ) console.log('(ajax) success but poster id=' + id + ' not found');
            $('#modal-add-to-cart .uk-modal-body').html(res);
            //$('#modal-add-to-cart #add-to-cart-order-button').attr('disabled',false);
            $('#modal-add-to-cart #add-to-cart-order-button').show();
            $('#modal-add-to-cart #add-to-cart-clear-button').attr('disabled',false);
            $('#cart #cartCount').html(0);
            $('#modal-add-to-cart table tbody tr input[type="number"]').each(function() {
                const qty = $(this).val();
                const currentCartCount = $('#cart #cartCount').text();
                $('#cart #cartCount').html( parseInt(currentCartCount) + parseInt(qty) );
            });
            $('#cart a').attr('uk-tooltip','title: Выбрано картин: ' + $('#cart #cartCount').text() + ' шт.; pos: bottom; delay: 400');
            UIkit.modal('#modal-add-to-cart').show();
        },
        error: (err) => {
            console.log('Error! add to cart false: ' + JSON.stringify(err));
        },
    });
});

/**
 * (AJAX) function plus/minus qty into cart
 * @param {*} id 
 * @param {*} that 
 */
function changeQtyItemCart(id, that) {
    // if value == 1 - return
    if (that.defaultValue === 1) return false;
    // plus 1
    if ( that.defaultValue < that.value ) {
        $.ajax({
            url: 'site/add-to-cart',
            data: {id: id},
            type: 'GET',
            success: (res) => {
                if( !res ) console.log('(ajax) success but poster id=' + id + ' not found');
                $('#modal-add-to-cart .uk-modal-body').html(res);
                $('#cart #cartCount').html(0);
                $('#modal-add-to-cart table tbody tr input[type="number"]').each(function() {
                    const qty = $(this).val();
                    const currentCartCount = $('#cart #cartCount').text();
                    $('#cart #cartCount').html( parseInt(currentCartCount) + parseInt(qty) );
                });
                $('#cart a').attr('uk-tooltip','title: Выбрано картин: ' + $('#cart #cartCount').text() + ' шт.; pos: bottom; delay: 400');
            },
            error: (err) => {
                console.log('Error! plus 1 false: ' + JSON.stringify(err));
            },
        });
    // minus 1
    } else if ( that.defaultValue > that.value ) {
        $.ajax({
            url: 'site/minus-item-from-cart',
            data: {id: id},
            type: 'GET',
            success: (res) => {
                if( !res ) console.log('(ajax) success but item not found');
                $('#modal-add-to-cart .uk-modal-body').html(res);
                $('#cart #cartCount').html(0);
                $('#modal-add-to-cart table tbody tr input[type="number"]').each(function() {
                    const qty = $(this).val();
                    const currentCartCount = $('#cart #cartCount').text();
                    $('#cart #cartCount').html( parseInt(currentCartCount) + parseInt(qty) );
                });
                $('#cart a').attr('uk-tooltip','title: Выбрано картин: ' + $('#cart #cartCount').text() + ' шт.; pos: bottom; delay: 400');
            },
            error: (err) => {
                console.log('Error! minus 1 false: ' + JSON.stringify(err));
            },
        });
    } else {
        // default - return
        return false;
    }
    // defaultValue = current value
    that.defaultValue = that.value;
}

// AJAX clear cart function (site/clearCart action)
function clearCart() {
    $.ajax({
        url: 'site/clear-cart',
        type: 'GET',
        success: (res) => {
            if( !res ) console.log('(ajax) success but clear false');
            $('#modal-add-to-cart .uk-modal-body').html(res);
            //$('#modal-add-to-cart #add-to-cart-order-button').attr('disabled',true);
            $('#modal-add-to-cart #add-to-cart-order-button').hide();
            $('#modal-add-to-cart #add-to-cart-clear-button').attr('disabled',true);
            $('#cart #cartCount').html(0);
            $('#cart a').attr('uk-tooltip','title: Ваша корзина пуста...; pos: bottom; delay: 400');
            UIkit.modal('#modal-add-to-cart').show();
        },
        error: (err) => {
            console.log('Error! clear cart false: ' + JSON.stringify(err));
        },
    });
}
// AJAX show cart on click (site/showCart action)
$('#cart a').on('click', function(e) {
    e.preventDefault();
    $.ajax({
        url: 'site/show-cart',
        type: 'GET',
        success: (res) => {
            if( !res ) console.log('(ajax) success but show false');
            $('#modal-add-to-cart .uk-modal-body').html(res);
            if($('#cart #cartCount').text() !== '0') {
                UIkit.modal('#modal-add-to-cart').show();
                $('#cart a').attr('uk-tooltip','title: Выбрано картин: ' + $('#cart #cartCount').text() + ' шт.; pos: bottom; delay: 400');
            } else {
                $('#cart a').attr('uk-tooltip','title: Ваша корзина пуста...; pos: bottom; delay: 400');
            }
            
        },
        error: (err) => {
            console.log('Error! show cart false: ' + JSON.stringify(err));
        },
    });
});

// AJAX delete poster by id from cart (site/deleteItemFromCart action)
$('#modal-add-to-cart .uk-modal-body').on('click', '.cart-delete-item', function(e) {
    const id = e.target.dataset.id;
    $.ajax({
        url: 'site/delete-item-from-cart',
        data: {id: id},
        type: 'GET',
        success: (res) => {
            if( !res ) console.log('(ajax) success but item not found');
            $('#modal-add-to-cart .uk-modal-body').html(res);
            const qty = $(this).closest('tr').find('input[type="number"]').val();
            $('#cart #cartCount').html( parseInt($('#cart #cartCount').html()) - parseInt(qty) );
            if($('#cart #cartCount').text() == '0') {
                //$('#modal-add-to-cart #add-to-cart-order-button').attr('disabled',true);
                $('#modal-add-to-cart #add-to-cart-order-button').hide();
                $('#modal-add-to-cart #add-to-cart-clear-button').attr('disabled',true);
                $('#cart a').attr('uk-tooltip','title: Ваша корзина пуста...; pos: bottom; delay: 400');
            } else {
                $('#modal-add-to-cart #add-to-cart-order-button').show();
                $('#cart a').attr('uk-tooltip','title: Выбрано картин: ' + $('#cart #cartCount').text() + ' шт.; pos: bottom; delay: 400');
            }
            UIkit.modal('#modal-add-to-cart').show();
        },
        error: (err) => {
            console.log('Error! delete item from cart false: ' + JSON.stringify(err));
        },
    });
});

/*$('.poster-types-modules li a img').on('click', function(e) {
    e.preventDefault();
    $('#poster-cover-type-module img').attr('src', $(this).data('src'));
    console.log($(this).data('price'));
});*/
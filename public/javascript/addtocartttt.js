const product = [
    {
        id:0,
        image:'../images/poster.jpg',
        title:'Poster',
        price: 10,
    },
    {
        id:1,
        image:'../images/mug.jpg',
        title:'Mug',
        price: 15,
    },
    {
        id:2,
        image:'../images/bougie.jpg',
        title:'Bougie',
        price: 17,
    },    
    {
        id:3,
        image:'../images/couverture-chauffante.jpg',
        title:'Couverture-chauffante',
        price: 19,
    },
    {
        id:4,
        image:'../images/tshirt.jpg',
        title:'T-shirt',
        price: 14,
    },
    {
        id:5,
        image:'../images/spiruline-paillettes-100g.jpg',
        title:'Spiruline /100g',
        price: 17,
    },
    {
        id:6,
        image:'../images/coque-tel.jpg',
        title:'Coque Smartphone',
        price: 8,
    },

];

const categories = [...new Set(product.map((item)=>
    {return item}))]
    let i = 0;
    document.getElementById('root').innerHTML = categories.map((item)=>
    {
        var {image, title, price} = item;
        return(
            `<div class='box'>
                <div class='img-box'>
                    <img class='images' src=${image}></img>
                </div>
            <div class='bottom'>
            <p>${title}</p>
            <h2>€ ${price}.00</h2>`+
            "<button onclick='addtocart("+(i++)+")'>Ajouter au panier</button>"+
            `</div>
            </div>`       
        )
    }).join('')

    var cart = [];
    function addtocart(a){
        cart.push({...categories[a]});
        displaycart();
    }

    function delElement(a){
        cart.splice(a, 1);
        displaycart();
    }
    function displaycart(a){
        let j = 0, total=0;
        document.getElementById("count").innerHTML=cart.length;
        if(cart.length==0){
            document.getElementById('cartItem').innerHTML = "Votre panier est vide";
            document.getElementById("total").innerHTML = "€ "+0+".00";
        }
        else{
            document.getElementById("cartItem").innerHTML = cart.map((item)=>
            {
                var {image, title, price} = item;
                total=total+price;
                document.getElementById("total").innerHTML = "€ "+total+".00";
                return(
                    `<div class='cart-item'>
                    <div class='row-img'>
                        <img class='rowimg' src=${image}>
                    </div>
                    <p style='font-size:12px;'>${title}</p>
                    <h2 style='font-size:15px'>€ ${price}.00</h2>`+
                    "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>"

                 );
            }).join('');
        }
    }
    
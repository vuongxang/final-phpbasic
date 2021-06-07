$( document ).ready(function() {
    let proList = [];
$('#keyword').keyup(function() {
    let keyword = $(this).val();
    
    $.ajax({
        url: '?scope=page&action=searchProduct',
        method: "post",
        data: {
            keyword: keyword
        },
        dataType: 'json',
        success: function(res) {
            proList = res;

            const results = proList.map((item) => {
                return `
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                        <div class="card border-0">
                            <a href="?scope=product&action=view&id=${item.id}">
                                <img src="${item.image}" class="card-img-top" alt="...">
                            </a>
                        <div class="card-body">
                            <a href="?scope=product&action=view&id=${item.id}">
                                <h5 class="card-title">${item.name}</h5>
                            </a>
                            <p class="card-text">Price: ${item.price}$</p>
                            <a href="?scope=product&action=view&id=${item.id}" class="btn btn-dark rounded-pill shadow mb-5">DETAIL</a>
                        </div>
                        </div>
                    </div>
                `
            }).join("");
            $('#product').empty();
            $('#product').append(results);
        }
    })
})

let colors=[];
$('#myform :checkbox').change(function() {
    if (this.checked) {
        colors.push($(this).val())
    } else {
        colors = colors.filter(color => color !== $(this).val() )
    }

    $.ajax({
        url: '?scope=page&action=filterByColor',
        method: "post",
        data: {
            colors: colors
        },
        dataType: 'json',
        success: function(res) {
            console.log(res);
            proList = res;

            const results = proList.map((item) => {
                return `
                    <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                        <div class="card border-0">
                            <a href="?scope=product&action=view&id=${item.id}">
                                <img src="${item.image}" class="card-img-top" alt="...">
                            </a>
                        <div class="card-body">
                            <a href="?scope=product&action=view&id=${item.id}">
                                <h5 class="card-title">${item.name}</h5>
                            </a>
                            <p class="card-text">Price: ${item.price}$</p>
                            <a href="?scope=product&action=view&id=${item.id}" class="btn btn-dark rounded-pill shadow mb-5">DETAIL</a>
                        </div>
                        </div>
                    </div>
                `
            }).join("");
            $('#product').empty();
            $('#product').append(results);
        }
    })
});

$('#add-form').submit(function (e) {
    e.preventDefault();
    const name = $('#name').val();
    const price = $('#price').val();
    const image = $('#image').val();
    const description = $('textarea#description').val();
    const cate_id = $('input[name="cate_id[]"]').val();
    console.log(cate_id);
    // const color_id = $('input[name="color_id"]').value;

    let check= true;
    if(name==""){
        let nameError = "Fild is required";
        $('#nameError').text(nameError);
        check = false;
    }
    if(price==""){
        let priceError = "Fild is required";
        $('#priceError').text(priceError);
        check = false;
    }
    if(isNaN(price)){
        let priceError = "Price not a number";
        $('#priceError').text(priceError);
        check = false;
    }
    if(price <0 ){
        let priceError = "Price need > 0";
        $('#priceError').text(priceError);
        check = false;
    }
    if(image==""){
        let imageError = "Fild is required";
        $('#imageError').text(imageError);
        check = false;
    }
    if(description==""){
        let descriptionError = "Fild is required";
        $('#descriptionError').text(descriptionError);
        check = false;
    }

    if(check==true){
        $(this).unbind('submit').submit()
    }

    // const objNew = {
    //     name: name,
    //     price: price,
    //     image: image,
    //     description: description,
    //     cate_id: cate_id,
    //     color_id: color_id,
    // }
    // console.log(objNew);
    // const url = ``;
    // axios.post(url, objNew)
    //     .then(function (response) {
    //            console.log(response)
    //     });
});
});



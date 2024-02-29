document.getElementById('dashboard').addEventListener('click',()=>{
    document.getElementById('customers').removeAttribute('class','dashboradActive')
    document.querySelector('#customers a').removeAttribute('class','dashboradActiveFont')
    document.getElementById('products').removeAttribute('class','dashboradActive')
    document.querySelector('#products a').removeAttribute('class','dashboradActiveFont')

    document.getElementById('dashboard').setAttribute('class','dashboradActive')
    document.querySelector('#dashboard a').setAttribute('class','dashboradActiveFont')
    document.getElementById('iframe').setAttribute('src','dashboard.php')
})
document.getElementById('products').addEventListener('click',()=>{
    document.getElementById('dashboard').removeAttribute('class','dashboradActive')
    document.querySelector('#dashboard a').removeAttribute('class','dashboradActiveFont')
    document.getElementById('customers').removeAttribute('class','dashboradActive')
    document.querySelector('#customers a').removeAttribute('class','dashboradActiveFont')

    document.getElementById('products').setAttribute('class','dashboradActive')
    document.querySelector('#products a').setAttribute('class','dashboradActiveFont')
    document.getElementById('iframe').setAttribute('src','products.php')
})
document.getElementById('customers').addEventListener('click',()=>{
    document.getElementById('dashboard').removeAttribute('class','dashboradActive')
    document.querySelector('#dashboard a').removeAttribute('class','dashboradActiveFont')
    document.getElementById('products').removeAttribute('class','dashboradActive')
    document.querySelector('#products a').removeAttribute('class','dashboradActiveFont') 
    
    document.getElementById('customers').setAttribute('class','dashboradActive')
    document.querySelector('#customers a').setAttribute('class','dashboradActiveFont')
    document.getElementById('iframe').setAttribute('src','customers.php')
})

let displaySpace = document.getElementById('display');



//-------------- part for get all users ----------------

let allUsers = document.getElementById('allUsers');

allUsers.addEventListener("click", (e) =>{
    getUsers();
})

async function getUsers(){
    let response = await fetch(`users`, {method: 'GET'});
    let responseData = await response.json();
    length = responseData[0].length;
    displaySpace.innerHTML='';

    for (let i = 0; i < length; i++) {
    let template = `
        <li id='' class="user">
            <span>${responseData[0][i].first_name}</span>
            <span>${responseData[0][i].last_name}</span>
            <span>${responseData[0][i].email}</span>
        </li>`;
    displaySpace.insertAdjacentHTML('beforeend', template);
    }
}

//-------------- part for get one specific users ----------------

let oneUser = document.getElementById('oneUser');

async function getOneUser(userid){
    let response = await fetch(`users/${userid}`, {method: 'GET'});
    let responseData = await response.json();
    displaySpace.innerHTML='';

    let template = `
        <div class="user">
            <p><span>${responseData.last_name} </span><span> ${responseData.first_name}</span></p>
            <span>${responseData.email}</span>
        </div>`;
    displaySpace.insertAdjacentHTML('beforeend', template);   
}


oneUser.addEventListener("submit", (e) =>{
    e.preventDefault();   
    let userid = e.target[0].value;
    getOneUser(userid);
})







//-------------- part for get all books ----------------

let allBooks = document.getElementById('allBooks');

allBooks.addEventListener("click", (e) =>{
    getBooks();
    console.log("click");
})

async function getBooks(){
    let response = await fetch(`books`, {method: 'GET'});
    let responseData = await response.json();
    // console.log(responseData);
    lengthBook = responseData[0].length;
    
    displaySpace.innerHTML='';

    for (let i = 0; i < lengthBook; i++) {
    let template = `
        <div class="book">
            <h2><span>${responseData[0][i].title}</span></h2>
            <span>${responseData[0][i].content}</span>
        </div>`;
    displaySpace.insertAdjacentHTML('beforeend', template);
    }   
}


//-------------- part for get one specific book ----------------

let oneBook = document.getElementById('oneBook');

async function getOneBook(bookid){
    let response = await fetch(`books/${bookid}`, {method: 'GET'});
    let responseData = await response.json();
    // console.log(responseData);
    displaySpace.innerHTML='';
    
    let template = `
        <div class="book">
            <h2><span> ${responseData[0].title}</span></h2>
            <p><span>Id du livre : ${responseData[0].id}</span></p>
            <p><span>Description du livre : ${responseData[0].content}</span></p>
        </div>`;
    displaySpace.insertAdjacentHTML('beforeend', template);
      
}


oneBook.addEventListener("submit", (e) =>{
    e.preventDefault();   
    let bookid = e.target[0].value;
    // console.log("click");
    // console.log(bookid);
    getOneBook(bookid);
})
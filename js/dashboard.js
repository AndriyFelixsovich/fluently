let sitBarIsOpen = true;
toggleBtn.addEventListener('click', (event) => {
    event.preventDefault()
    if (sitBarIsOpen) {
        dashboard_sidebar.style.width = '10%';
        dashboard_sidebar.style.transition = '0.3s all';
        dashboard_content_content.style.width = '90%';
        dashboard_logo.style.fontSize = '20px';
        userImage.style.width = '40px';

        menuText = document.getElementsByClassName('menuText');
        for (let i = 0; i < menuText.length; i++) {
            menuText[i].style.display = 'none';
        }

        document.getElementsByClassName('dashboard_menus_lists')[0].style.textAlign = 'center';
        sitBarIsOpen = false;
    } else {

        dashboard_sidebar.style.width = '20%';
        dashboard_content_content.style.width = '80%';
        dashboard_logo.style.fontSize = '50px';
        userImage.style.width = '100px';

        menuText = document.getElementsByClassName('menuText');
        for (let i = 0; i < menuText.length; i++) {
            menuText[i].style.display = 'inline-block';
        }

        document.getElementsByClassName('dashboard_menus_lists')[0].style.textAlign = 'left';


        sitBarIsOpen = true;
    }
})


// Добавьте JavaScript код для исчезновения сообщения через 5 секунд
// setTimeout(function() {
//     var responseMessage = document.querySelector('.responseMessage');
//     if (responseMessage) {
//         responseMessage.style.display = 'none';
//     }
// }, 5000);


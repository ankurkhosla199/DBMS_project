document.querySelectorAll('.dropdown-menu').forEach(item => {
    item.addEventListener('click', event => {
        window.prompt("Please write a comment if required");
    })
});
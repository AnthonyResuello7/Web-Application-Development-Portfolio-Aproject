const navMenu = document.querySelector('.nav-menu');
const openNavBtn = document.querySelector('#open-nav-icon');
const closeNavBtn = document.querySelector('#close-nav-icon');

const openNav = () => {
    navMenu.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline';
}

const closeNav = () => {
    navMenu.style.display = 'none';
    openNavBtn.style.display = 'inline';
    closeNavBtn.style.display = 'none';
}

const resizeNav = () => {
    const screenWidth = window.innerWidth;
    if (screenWidth > 1024) {
        openNavBtn.style.display = 'none';
        closeNavBtn.style.display = 'none';
        navMenu.style.display = 'flex';
    } else {
        openNavBtn.style.display = 'inline';
        closeNavBtn.style.display = 'none';
        navMenu.style.display = 'none';
    }
}

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);
window.addEventListener('resize', resizeNav);

// Call resizeNav initially to set the icon display correctly on page load
resizeNav();

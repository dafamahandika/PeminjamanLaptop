const currentLocation = location.href;
const menuNav = document.querySelectorAll('li')
const navLength = menuNav.length;

for (let i = 0; i < navLength; i++) {
     if (menuNav[i].href === currentLocation) {
          menuNav[i].className = 'active'
     }
     
}    
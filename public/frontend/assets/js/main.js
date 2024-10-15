/*=============== CHANGE BACKGROUND HEADER ===============*/
function scrollHeader() {
    const header = document.getElementById("header");
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if (this.scrollY >= 80) header.classList.add("scroll-header");
    else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);

jQuery(function($) {
    var images = [
        'https://benthanhtourist.com/uploads/images/banner/2023/han-quoc-2023.jpg',
        'https://benthanhtourist.com//uploads/images/banner/2023/chau-uc-2023.jpg',
        'https://benthanhtourist.com/uploads/images/banner/2023/tour-trung-quoc.jpg',
        // Thêm nhiều URL ảnh nền khác nếu bạn muốn
    ];
    
    var currentIndex = 0;

    function changeBackground() {
        $('#hero').css('background-image', 'url(' + images[currentIndex] + ')');
        currentIndex++;
        if (currentIndex == images.length) {
            currentIndex = 0;
        }
    }

    setInterval(changeBackground, 3000); // Thay đổi ảnh nền mỗi 3 giây
});

let anhnhos = document.getElementsByClassName('anhnho')
let hienthianhnho = document.getElementsByClassName('hienthi')
for(var i=0; i< anhnhos.length; i++){
    anhnhos[i].addEventListener('click', function(){
        this.classList.add('active')
        document.getElementById('anhlon').src = this.src
    })
}

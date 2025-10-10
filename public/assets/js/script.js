$(function() {
    logout();
    categoryCollapse();
})

function logout() {
    $('#logout').click(function(e) {
        e.preventDefault();
        $('#logout-form').submit();
    });
}

function categoryCollapse() {
    /**
     * Alternate '+' and '-' symbols on item on categories list page.
     */
    const collapseLinks = document.querySelectorAll('.collapse-link');

    collapseLinks.forEach( link => {
        link.addEventListener('click', function() {
            let icon = this.querySelector('.collapse-icon');
            if (icon.innerText == '-') {
                icon.innerText = '+';
            }
            else {
                icon.innerText = '-';
            }
        });
    });
}

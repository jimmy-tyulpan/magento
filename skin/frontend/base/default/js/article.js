document.addEventListener('DOMContentLoaded', function(){
    let allReadMore = document.querySelectorAll('.read-more'),
        opt = {
            default: 300,
            padding: 15,
            delay: 200
        };
    allReadMore.forEach(function (element) {
        element.addEventListener('click',function (e) {
            let articleWrapper = document.querySelector('div[data-article="'+ e.target.dataset.art +'"]'),
                article = document.querySelector('div[data-article="'+ e.target.dataset.art +'"] div'),
                readMore = document.querySelector('div[data-art="'+ e.target.dataset.art +'"]');
            if (!article.classList.contains('open')) {
                articleWrapper.style.height = article.clientHeight + opt.padding + 'px';
                article.classList.add('open');
                setTimeout(function(){
                    readMore.innerText = 'Hide ...';
                },opt.delay)

            } else {
                article.classList.remove('open');
                articleWrapper.style.height = opt.default + 'px';
                setTimeout(function(){
                    readMore.innerText = 'Show more...';
                },opt.delay)
            }
        })
    })
});
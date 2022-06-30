function setActiveTab(tab) {
    document.querySelectorAll('.tab-item').forEach(function(e){
        if(e.getAttribute('data-for') == tab) {
            e.classList.add('active');
        } else {
            e.classList.remove('active');
        }
    });
}
function showTab() {
    if(document.querySelector('.tab-item.active')) {
        let activeTab = document.querySelector('.tab-item.active').getAttribute('data-for');
        document.querySelectorAll('.tab-body').forEach(function(e){
            if(e.getAttribute('data-item') == activeTab) {
                e.style.display = 'block';
            } else {
                e.style.display = 'none';
            }
        });
    }
}

if(document.querySelector('.tab-item')) {
    showTab();
    document.querySelectorAll('.tab-item').forEach(function(e){
        e.addEventListener('click', function(r) {
            setActiveTab( r.target.getAttribute('data-for') );
            showTab();
        });
    });
}

document.querySelector('.feed-new-input-placeholder').addEventListener('click', function(obj){
    obj.target.style.display = 'none';
    document.querySelector('.feed-new-input').style.display = 'block';
    document.querySelector('.feed-new-input').focus();
    document.querySelector('.feed-new-input').innerText = '';
});

document.querySelector('.feed-new-input').addEventListener('blur', function(obj) {
    let value = obj.target.innerText.trim();
    if(value == '') {
        obj.target.style.display = 'none';
        document.querySelector('.feed-new-input-placeholder').style.display = 'block';
    }
});
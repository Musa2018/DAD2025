
// دوال JavaScript مشتركة للمشروع

function togglePass(){
    var pass = document.getElementById("password");
    var eye = document.getElementById("eyeIcon");
    if(pass.type === "password"){
        pass.type = "text";
        eye.innerHTML = '<line x1="1" y1="1" x2="23" y2="23" stroke="#888" stroke-width="2"/><ellipse cx="12" cy="12" rx="9" ry="5" fill="none" stroke="#888" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="none" stroke="#888" stroke-width="2"/>';
    } else {
        pass.type = "password";
        eye.innerHTML = '<ellipse cx="12" cy="12" rx="9" ry="5" fill="none" stroke="#888" stroke-width="2"/><circle cx="12" cy="12" r="2" fill="none" stroke="#888" stroke-width="2"/>';
    }
}

// دوال AJAX مشتركة
function sendAjaxRequest(url, data, callback) {
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data)
    })
    .then(response => response.json())
    .then(data => callback(data))
    .catch(error => console.error('Error:', error));
}

// تحسين تجربة المستخدم
document.addEventListener('DOMContentLoaded', function() {
    // إضافة تأثيرات بصرية
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.textContent = 'جاري التحميل...';
                submitBtn.disabled = true;
            }
        });
    });
});

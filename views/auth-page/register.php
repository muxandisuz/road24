<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Ro\'yxatdan o\'tish - Road24';
?>

<div class="auth-page-container py-5 d-flex align-items-center justify-content-center min-vh-75">
    <div class="auth-card-modern shadow-lg rounded-4 overflow-hidden border-0 bg-body">
        <div class="row g-0">
            <!-- Left Branding Side -->
            <div class="col-lg-5 auth-brand-side text-white p-4 p-md-5 d-none d-lg-flex flex-column justify-content-between position-relative">
                <div class="position-relative z-1">
                    <div class="d-inline-flex align-items-center gap-2 mb-4 px-3 py-1 rounded-pill bg-white bg-opacity-10 backdrop-blur">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C2.1 10.7 2 11 2 11.4V16c0 .6.4 1 1 1h2"/>
                            <circle cx="7" cy="17" r="2"/>
                            <path d="M9 17h6"/>
                            <circle cx="17" cy="17" r="2"/>
                        </svg>
                        <span class="small fw-semibold letter-spacing-1">ROAD24 AUTO</span>
                    </div>
                    <h2 class="display-6 fw-bold lh-sm mb-3">Yangi hisob yarating</h2>
                    <p class="text-white-50 lead fs-6">Road24 platformasiga a'zo bo'ling va avtomobillaringizni samarali boshqaring.</p>
                </div>

                <div class="position-relative z-1">
                    <ul class="list-unstyled d-flex flex-column gap-2 mb-0 text-white-75 small">
                        <li class="d-flex align-items-center gap-2">
                            <svg width="16" height="16" class="text-info flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Tezkor va oson ro'yxatdan o'tish
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <svg width="16" height="16" class="text-info flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Avtomobillar katalogini boshqarish
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <svg width="16" height="16" class="text-info flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                            Xavfsiz API va shaxsiy ma'lumotlar
                        </li>
                    </ul>
                </div>

                <div class="auth-brand-bg-decor"></div>
            </div>

            <!-- Right Form Side -->
            <div class="col-lg-7 p-4 p-sm-5 d-flex flex-column justify-content-center">
                <div class="auth-form-wrapper mx-auto w-100" style="max-width: 440px;">

                    <!-- Mobile Brand Header -->
                    <div class="d-lg-none text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-circle bg-primary bg-opacity-10 text-primary mb-2">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C2.1 10.7 2 11 2 11.4V16c0 .6.4 1 1 1h2"/>
                                <circle cx="7" cy="17" r="2"/>
                                <path d="M9 17h6"/>
                                <circle cx="17" cy="17" r="2"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold mb-0">Road<span class="text-primary">24</span></h3>
                    </div>

                    <div class="mb-4 text-center text-lg-start">
                        <h3 class="fw-bold mb-1">Ro'yxatdan o'tish</h3>
                        <p class="text-secondary small mb-0">Yangi akkaunt yaratish uchun maydonlarni to'ldiring</p>
                    </div>

                    <form id="registerForm" class="needs-validation" novalidate autocomplete="off">
                        <!-- Username Field -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-body-secondary" for="regUsername">Foydalanuvchi nomi</label>
                            <div class="input-group input-group-lg auth-input-group">
                                <span class="input-group-text bg-transparent border-end-0 text-secondary pe-2">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                </span>
                                <input
                                    type="text"
                                    id="regUsername"
                                    name="username"
                                    class="form-control border-start-0 ps-2"
                                    placeholder="Username tanlang"
                                    required
                                    autofocus
                                >
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-body-secondary" for="regEmail">Elektron pochta</label>
                            <div class="input-group input-group-lg auth-input-group">
                                <span class="input-group-text bg-transparent border-end-0 text-secondary pe-2">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                </span>
                                <input
                                    type="email"
                                    id="regEmail"
                                    name="email"
                                    class="form-control border-start-0 ps-2"
                                    placeholder="namuna@domain.uz"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-body-secondary" for="regPassword">Parol</label>
                            <div class="input-group input-group-lg auth-input-group">
                                <span class="input-group-text bg-transparent border-end-0 text-secondary pe-2">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    </svg>
                                </span>
                                <input
                                    type="password"
                                    id="regPassword"
                                    name="password"
                                    class="form-control border-start-0 border-end-0 ps-2"
                                    placeholder="Kamida 6 ta belgi"
                                    required
                                >
                                <button type="button" class="btn border border-start-0 text-secondary" id="toggleRegPasswordBtn" tabindex="-1">
                                    <svg id="regEyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Status Message Box -->
                        <div id="message" class="mb-3 d-none"></div>

                        <!-- Submit Button -->
                        <button type="submit" id="submitRegBtn" class="btn btn-primary btn-lg w-100 rounded-3 fw-semibold shadow-sm py-2 d-flex align-items-center justify-content-center gap-2 auth-submit-btn">
                            <span class="btn-text">Ro'yxatdan o'tish</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            <svg class="btn-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top border-light-subtle">
                        <p class="text-body-secondary small mb-0">
                            Accountingiz bormi?
                            <?= Html::a('Kirish', ['/auth-page/login'], ['class' => 'fw-semibold text-primary text-decoration-none hover-underline ms-1']) ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-page-container {
    min-height: calc(100vh - 170px);
}
.auth-card-modern {
    width: 100%;
    max-width: 960px;
    box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(0, 0, 0, 0.05) !important;
}
.auth-brand-side {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0369a1 100%);
    overflow: hidden;
}
.auth-brand-bg-decor {
    position: absolute;
    right: -40px;
    bottom: -40px;
    width: 260px;
    height: 260px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.25) 0%, rgba(14, 165, 233, 0) 70%);
    border-radius: 50%;
    pointer-events: none;
}
.auth-input-group .form-control {
    font-size: 0.95rem;
    transition: all 0.2s ease;
}
.auth-input-group:focus-within {
    box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.2);
    border-radius: 0.5rem;
}
.auth-input-group:focus-within .input-group-text,
.auth-input-group:focus-within .form-control,
.auth-input-group:focus-within .btn {
    border-color: #0ea5e9;
}
.auth-submit-btn {
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    border: none;
    transition: all 0.25s ease;
}
.auth-submit-btn:hover {
    background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 15px rgba(2, 132, 199, 0.35) !important;
}
.auth-submit-btn:active {
    transform: translateY(0);
}
.letter-spacing-1 {
    letter-spacing: 0.08em;
}
.hover-underline:hover {
    text-decoration: underline !important;
}
</style>

<script>
    // Password visibility toggle
    const toggleRegPasswordBtn = document.getElementById('toggleRegPasswordBtn');
    const regPassword = document.getElementById('regPassword');
    const regEyeIcon = document.getElementById('regEyeIcon');

    toggleRegPasswordBtn.addEventListener('click', function() {
        const isPassword = regPassword.getAttribute('type') === 'password';
        regPassword.setAttribute('type', isPassword ? 'text' : 'password');
        regEyeIcon.innerHTML = isPassword
            ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>'
            : '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
    });

    // Form submission
    document.getElementById('registerForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById('submitRegBtn');
        const btnText = submitBtn.querySelector('.btn-text');
        const spinner = submitBtn.querySelector('.spinner-border');
        const btnArrow = submitBtn.querySelector('.btn-arrow');
        const message = document.getElementById('message');

        const data = Object.fromEntries(new FormData(this).entries());

        // UI loading state
        submitBtn.disabled = true;
        btnText.textContent = 'Yaratilmoqda...';
        spinner.classList.remove('d-none');
        btnArrow.classList.add('d-none');
        message.className = 'd-none';

        try {
            const response = await fetch(
                <?= json_encode(Url::to(['/auth/register'])) ?>,
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }
            );

            const result = await response.json();

            if (response.ok && result.success) {
                message.innerHTML = `
                    <div class="alert alert-success d-flex align-items-center gap-2 mb-0 py-2 px-3 rounded-3" role="alert">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        <div>
                            <strong>Tabriklaymiz!</strong> ${result.message || 'Ro‘yxatdan muvaffaqiyatli o‘tdingiz!'}<br>
                            <small>Kirish sahifasiga yo‘naltirilmoqda...</small>
                        </div>
                    </div>
                `;
                message.className = 'mb-3';
                this.reset();

                setTimeout(() => {
                    window.location.href = <?= json_encode(Url::to(['/auth-page/login'])) ?>;
                }, 1600);

            } else {
                let errText = result.message || '';
                if (result.errors) {
                    const errList = Object.values(result.errors).flat().join('<br>');
                    if (errList) errText = errList;
                }
                if (!errText) errText = 'Ma\'lumotlarni kiritishda xatolik yuz berdi';

                message.innerHTML = `
                    <div class="alert alert-danger d-flex align-items-start gap-2 mb-0 py-2 px-3 rounded-3" role="alert">
                        <svg width="20" height="20" class="mt-1 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        <div>${errText}</div>
                    </div>
                `;
                message.className = 'mb-3';
            }

        } catch (error) {
            message.innerHTML = `
                <div class="alert alert-danger d-flex align-items-center gap-2 mb-0 py-2 px-3 rounded-3" role="alert">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div>Server bilan bog‘lanishda xatolik yuz berdi. Qaytadan urinib ko‘ring.</div>
                </div>
            `;
            message.className = 'mb-3';
        } finally {
            submitBtn.disabled = false;
            btnText.textContent = 'Ro\'yxatdan o\'tish';
            spinner.classList.add('d-none');
            btnArrow.classList.remove('d-none');
        }
    });
</script>

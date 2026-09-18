document.addEventListener('DOMContentLoaded', () => {

    // 1. Mobile Navigation Toggle
    const navToggle = document.getElementById('nav-toggle');
    const primaryNav = document.getElementById('primary-navigation');

    navToggle.addEventListener('click', () => {
        const isExpanded = navToggle.getAttribute('aria-expanded') === 'true';
        navToggle.setAttribute('aria-expanded', !isExpanded);
        primaryNav.classList.toggle('show');
    });

    // 2. Data & Rendering (Kegiatan Array)
    const kegiatanData = [
        { id: 1, name: 'Web Development Bootcamp', category: 'workshop', desc: 'Pelatihan intensif 2 minggu membuat website dari nol.', img: 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80' },
        { id: 2, name: 'Intro to Machine Learning', category: 'seminar', desc: 'Seminar pengenalan AI dan Machine Learning bersama praktisi.', img: 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80' },
        { id: 3, name: 'UI/UX Design Sprint', category: 'workshop', desc: 'Praktek merancang antarmuka aplikasi dalam 3 hari.', img: 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80' },
        { id: 4, name: 'Campus App Clone', category: 'project', desc: 'Proyek kolaboratif membuat replika aplikasi akademik kampus.', img: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80' },
        { id: 5, name: 'Tech Career Talk', category: 'seminar', desc: 'Bincang karir seputar dunia IT dan persiapannya.', img: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80' },
        { id: 6, name: 'Open Source Contribution', category: 'project', desc: 'Belajar berkontribusi pada proyek open source di GitHub.', img: 'https://images.unsplash.com/photo-1618401471353-b98afee0b2eb?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80' }
    ];

    const kegiatanGrid = document.getElementById('kegiatan-grid');
    const filterBtns = document.querySelectorAll('.filter-btn');

    function renderKegiatan(data) {
        // Hapus child yang ada (tidak menggunakan innerHTML untuk user data)
        kegiatanGrid.textContent = '';

        if (data.length === 0) {
            const emptyMsg = document.createElement('p');
            emptyMsg.textContent = 'Kegiatan tidak ditemukan.';
            kegiatanGrid.appendChild(emptyMsg);
            return;
        }

        data.forEach(item => {
            const card = document.createElement('div');
            card.className = 'menu-card';

            const img = document.createElement('img');
            img.src = item.img;
            img.alt = item.name;
            img.loading = 'lazy';

            const title = document.createElement('h3');
            title.textContent = item.name;

            const desc = document.createElement('p');
            desc.textContent = item.desc;

            const categoryLabel = document.createElement('span');
            categoryLabel.className = 'menu-price'; // Menggunakan style yang sama untuk label
            categoryLabel.textContent = item.category;

            card.appendChild(img);
            card.appendChild(title);
            card.appendChild(desc);
            card.appendChild(categoryLabel);

            kegiatanGrid.appendChild(card);
        });
    }

    // Initial render
    renderKegiatan(kegiatanData);

    // 3. Filter Kegiatan
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Hapus class active dari semua tombol
            filterBtns.forEach(b => b.classList.remove('active'));
            // Tambahkan class active ke tombol yang diklik
            btn.classList.add('active');

            const category = btn.getAttribute('data-filter');
            if (category === 'semua') {
                renderKegiatan(kegiatanData);
            } else {
                const filteredData = kegiatanData.filter(item => item.category === category);
                renderKegiatan(filteredData);
            }
        });
    });

    // 4. FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const isExpanded = question.getAttribute('aria-expanded') === 'true';
            const answerId = question.getAttribute('aria-controls');
            const answer = document.getElementById(answerId);

            // Tutup semua FAQ lainnya
            faqQuestions.forEach(q => {
                q.setAttribute('aria-expanded', 'false');
                const a = document.getElementById(q.getAttribute('aria-controls'));
                a.hidden = true;
                q.querySelector('.faq-icon').textContent = '+';
            });

            // Toggle FAQ saat ini
            if (!isExpanded) {
                question.setAttribute('aria-expanded', 'true');
                answer.hidden = false;
                question.querySelector('.faq-icon').textContent = '-';
            }
        });
    });

    // 5. Form Validation
    const contactForm = document.getElementById('contact-form');
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();

        let isValid = true;
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const messageInput = document.getElementById('message');

        // Reset errors
        document.querySelectorAll('.error-message').forEach(err => err.classList.remove('show'));
        document.querySelectorAll('input, textarea').forEach(input => input.setAttribute('aria-invalid', 'false'));
        document.getElementById('form-success').hidden = true;

        if (nameInput.value.trim() === '') {
            isValid = false;
            nameInput.setAttribute('aria-invalid', 'true');
            document.getElementById('name-error').classList.add('show');
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            isValid = false;
            emailInput.setAttribute('aria-invalid', 'true');
            document.getElementById('email-error').classList.add('show');
        }

        if (messageInput.value.trim() === '') {
            isValid = false;
            messageInput.setAttribute('aria-invalid', 'true');
            document.getElementById('message-error').classList.add('show');
        }

        if (isValid) {
            // Simulasi sukses
            document.getElementById('form-success').hidden = false;
            contactForm.reset();
        }
    });

    // 6. Back to Top Button
    const backToTopBtn = document.getElementById('back-to-top');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.hidden = false;
        } else {
            backToTopBtn.hidden = true;
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // 7. Dark Mode Theme Toggle
    const themeToggleBtn = document.getElementById('theme-toggle');
    themeToggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        // Menyimpan preferensi di localStorage
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });

    // Cek preferensi tema sebelumnya
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }
});

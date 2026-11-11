const menuButton = document.getElementById("menuButton");
const navMenu = document.getElementById("navMenu");

if (menuButton && navMenu) {
  menuButton.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("is-open");
    menuButton.classList.toggle("is-active", isOpen);
    menuButton.setAttribute("aria-expanded", String(isOpen));
    menuButton.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");
  });
  
  navMenu.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      navMenu.classList.remove("is-open");
      menuButton.classList.remove("is-active");
      menuButton.setAttribute("aria-expanded", "false");
      menuButton.setAttribute("aria-label", "Buka navigasi");
    });
  });

  document.addEventListener("click", (event) => {
    if (!navMenu.contains(event.target) && !menuButton.contains(event.target)) {
      navMenu.classList.remove("is-open");
      menuButton.classList.remove("is-active");
      menuButton.setAttribute("aria-expanded", "false");
    }
  });
}

// FILTERING DIVISI ROLE
const filterButtons = document.querySelectorAll('.filter-btn');
const roleCards = document.querySelectorAll('.role-card');
const filterEmpty = document.getElementById('filterEmpty');

filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
        const selectedDivision = button.dataset.filter;
        
        filterButtons.forEach((btn) => {
            btn.classList.remove('active');
            btn.setAttribute('aria-pressed', 'false');
        });
        button.classList.add('active');
        button.setAttribute('aria-pressed', 'true');

        let visibleCount = 0;
        roleCards.forEach((card) => {
            const cardDivision = card.dataset.category;
            const isVisible = selectedDivision === 'all' || cardDivision === selectedDivision;
            card.classList.toggle('is-hidden', !isVisible);
            if (isVisible) {
                visibleCount++;
            }
        });

        if (filterEmpty) {
            filterEmpty.hidden = visibleCount > 0;
        }
    });
});

// DETAIL MODAL ROLE
const roleModalOverlay = document.getElementById('roleModalOverlay');
const modalClose = document.getElementById('modalClose');
const modalCategory = document.getElementById('modalCategory');
const modalTitle = document.getElementById('modalTitle');
const modalDesc = document.getElementById('modalDesc');
const modalReqList = document.getElementById('modalReqList');
const modalApplyBtn = document.getElementById('modalApplyBtn');

roleCards.forEach((card) => {
    card.addEventListener('click', () => {
        const category = card.dataset.category;
        const name = card.dataset.roleName;
        const desc = card.dataset.roleDesc;
        const reqs = JSON.parse(card.dataset.roleReq || '[]');

        modalCategory.textContent = category;
        modalTitle.textContent = name;
        modalDesc.textContent = desc;

        modalReqList.innerHTML = '';
        reqs.forEach(req => {
            const li = document.createElement('li');
            li.textContent = req;
            modalReqList.appendChild(li);
        });

        modalApplyBtn.href = `mailto:career@sekolahkarir.com?subject=Lamaran%20Posisi%20${encodeURIComponent(name)}`;

        roleModalOverlay.classList.add('is-open');
    });
});

if (modalClose && roleModalOverlay) {
    modalClose.addEventListener('click', () => {
        roleModalOverlay.classList.remove('is-open');
    });

    roleModalOverlay.addEventListener('click', (e) => {
        if (e.target === roleModalOverlay) {
            roleModalOverlay.classList.remove('is-open');
        }
    });
}
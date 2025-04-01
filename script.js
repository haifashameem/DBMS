
document.addEventListener('DOMContentLoaded', function() {
    const noticeBoard = document.getElementById('notice-board');
    const addNoticeBtn = document.getElementById('add-notice-btn');
    const modal = document.getElementById('notice-form-modal');
    const closeBtn = document.querySelector('.close-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const noticeForm = document.getElementById('notice-form');
    const searchInput = document.getElementById('search');
    const searchBtn = document.getElementById('search-btn');
    const categoryFilter = document.getElementById('category-filter');

    let notices = [];

    function loadNotices() {
        fetch('get_notices.php')
            .then(res => res.json())
            .then(data => {
                notices = data;
                filterNotices();
            });
    }

    function displayNotices(noticesList) {
        noticeBoard.innerHTML = '';
        if (noticesList.length === 0) {
            noticeBoard.innerHTML = '<p class="no-notices">No notices found matching your criteria.</p>';
            return;
        }

        noticesList.forEach(notice => {
            const noticeCard = document.createElement('div');
            noticeCard.className = 'notice-card';

            const formattedDate = notice.date ? new Date(notice.date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            }) : 'No date specified';

            noticeCard.innerHTML = `
                <div class="notice-header">
                    <h3 class="notice-title">${notice.title}</h3>
                    <span class="notice-category ${notice.category}">${getCategoryName(notice.category)}</span>
                </div>
                <div class="notice-content">
                    <p>${notice.content}</p>
                </div>
                <div class="notice-date">
                    <span>${formattedDate}</span>
                </div>
            `;

            noticeBoard.appendChild(noticeCard);
        });
    }

    function getCategoryName(category) {
        const categories = {
            'event': 'Event',
            'job': 'Job Posting',
            'exam': 'Exam',
            'general': 'General'
        };
        return categories[category] || 'General';
    }

    function filterNotices() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value;

        const filteredNotices = notices.filter(notice => {
            const matchesSearch = notice.title.toLowerCase().includes(searchTerm) ||
                                  notice.content.toLowerCase().includes(searchTerm);
            const matchesCategory = selectedCategory === 'all' || notice.category === selectedCategory;
            return matchesSearch && matchesCategory;
        });

        displayNotices(filteredNotices);
    }

    addNoticeBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    cancelBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    noticeForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData();
        formData.append('title', document.getElementById('notice-title').value);
        formData.append('category', document.getElementById('notice-category').value);
        formData.append('content', document.getElementById('notice-content').value);
        formData.append('date', document.getElementById('notice-date').value || '');

        fetch('add_notice.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            alert(data);
            noticeForm.reset();
            modal.style.display = 'none';
            loadNotices();
        })
        .catch(err => console.error('Error:', err));
    });

    searchInput.addEventListener('input', filterNotices);
    searchBtn.addEventListener('click', filterNotices);
    categoryFilter.addEventListener('change', filterNotices);

    loadNotices();
});

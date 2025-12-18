<section class="schedule-section section-padding" id="section_4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="text-white mb-4">Event Schedule</h2>

                <!-- Week Pagination (Horizontal) -->
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <label class="text-white me-3">Week:</label>
                    <nav aria-label="Week pagination">
                        <ul class="pagination-custom" id="weekPagination">
                            <li class="pagination-item">
                                <button class="pagination-btn" onclick="previousWeek()" aria-label="Previous week">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                    </svg>
                                </button>
                            </li>
                            <li class="pagination-item">
                                <button class="pagination-btn active" id="currentWeekBtn">Week 1</button>
                            </li>
                            <li class="pagination-item">
                                <button class="pagination-btn" onclick="nextWeek()" aria-label="Next week">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </nav>

                    <!-- Direct Week Selector -->
                    <div class="ms-4">
                        @for($i = 1; $i <= 4; $i++)
                            <button class="week-btn {{ $i == 1 ? 'active' : '' }}" onclick="goToWeek({{ $i }})">
                                W{{ $i }}
                            </button>
                        @endfor
                    </div>
                </div>

                <!-- Weekday Pagination (Vertical/Sidebar) -->
                <div class="row">
                    <div class="col-md-3 col-lg-2">
                        <div class="weekday-sidebar">
                            <h5 class="text-white mb-3">Select Day:</h5>
                            <nav class="nav flex-column weekday-nav" id="weekdayNav">
                                <button class="nav-link weekday-btn active" data-weekday="monday" onclick="selectWeekday('monday')">
                                    <span class="weekday-icon">M</span> Monday
                                </button>
                                <button class="nav-link weekday-btn" data-weekday="tuesday" onclick="selectWeekday('tuesday')">
                                    <span class="weekday-icon">T</span> Tuesday
                                </button>
                                <button class="nav-link weekday-btn" data-weekday="wednesday" onclick="selectWeekday('wednesday')">
                                    <span class="weekday-icon">W</span> Wednesday
                                </button>
                                <button class="nav-link weekday-btn" data-weekday="thursday" onclick="selectWeekday('thursday')">
                                    <span class="weekday-icon">T</span> Thursday
                                </button>
                                <button class="nav-link weekday-btn" data-weekday="friday" onclick="selectWeekday('friday')">
                                    <span class="weekday-icon">F</span> Friday
                                </button>
                                <button class="nav-link weekday-btn" data-weekday="saturday" onclick="selectWeekday('saturday')">
                                    <span class="weekday-icon">S</span> Saturday
                                </button>
                                <button class="nav-link weekday-btn" data-weekday="sunday" onclick="selectWeekday('sunday')">
                                    <span class="weekday-icon">S</span> Sunday
                                </button>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-9 col-lg-10">
                        <div class="table-responsive">
                            <table class="schedule-table table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">WEEK</th>
                                        <th scope="col" id="currentWeekdayHeader">Monday</th>
                                    </tr>
                                </thead>
                                <tbody id="scheduleTableBody">
                                    <!-- Content loaded by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Week Pagination */
.pagination-custom {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 8px;
    align-items: center;
}

.pagination-btn {
    min-width: 40px;
    height: 40px;
    padding: 8px 12px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 500;
}

.pagination-btn.active {
    background: #ff6600;
    border-color: #ff6600;
}

/* Week Selector Buttons */
.week-btn {
    padding: 6px 12px;
    margin: 0 2px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s;
}

.week-btn:hover {
    background: rgba(255, 255, 255, 0.2);
}

.week-btn.active {
    background: #ff6600;
    border-color: #ff6600;
}

/* Weekday Sidebar */
.weekday-sidebar {
    background: rgba(0, 0, 0, 0.3);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.weekday-nav {
    gap: 10px;
}

.weekday-btn {
    text-align: left;
    padding: 12px 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    color: white;
    background: rgba(255, 255, 255, 0.05);
    transition: all 0.3s;
    margin-bottom: 8px;
}

.weekday-btn:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateX(5px);
}

.weekday-btn.active {
    background: rgba(255, 102, 0, 0.2);
    border-color: #ff6600;
    color: #ff6600;
    transform: translateX(10px);
}

.weekday-icon {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    margin-right: 10px;
    font-weight: bold;
}

/* Table styling */
.schedule-table {
    border-collapse: separate;
    border-spacing: 0;
}

.schedule-table th {
    border-bottom: 2px solid #ff6600;
    padding: 15px;
    font-size: 1.1rem;
}

.schedule-table td {
    padding: 20px;
    vertical-align: top;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    min-height: 150px;
}

.table-background-image-wrap {
    position: relative;
    background-size: cover;
    background-position: center;
    min-height: 120px;
}

.section-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}
</style>

<script>
// Pass Laravel data to JavaScript
const allEvents = @json($events ?? []);

// State management
let currentWeek = 1;
let currentWeekday = 'monday';
const maxWeeks = 4;
const weekdays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
const weekdayNames = {
    'monday': 'Monday',
    'tuesday': 'Tuesday',
    'wednesday': 'Wednesday',
    'thursday': 'Thursday',
    'friday': 'Friday',
    'saturday': 'Saturday',
    'sunday': 'Sunday'
};

// Group events by week and weekday for quick access
const groupedEvents = {};
allEvents.forEach(event => {
    if (!groupedEvents[event.week]) {
        groupedEvents[event.week] = {};
    }
    if (!groupedEvents[event.week][event.weekday]) {
        groupedEvents[event.week][event.weekday] = [];
    }
    groupedEvents[event.week][event.weekday].push(event);
});

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    loadSchedule(currentWeek, currentWeekday);
});

// Week pagination functions
function updateWeekDisplay() {
    document.getElementById('currentWeekBtn').textContent = 'Week ' + currentWeek;
    loadSchedule(currentWeek, currentWeekday);
}

function previousWeek() {
    if (currentWeek > 1) {
        currentWeek--;
        updateWeekDisplay();
    }
}

function nextWeek() {
    if (currentWeek < maxWeeks) {
        currentWeek++;
        updateWeekDisplay();
    }
}

function goToWeek(weekNumber) {
    currentWeek = weekNumber;

    // Update active week buttons
    document.querySelectorAll('.week-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');

    updateWeekDisplay();
}

// Weekday pagination functions
function selectWeekday(weekday) {
    currentWeekday = weekday;

    // Update active weekday buttons
    document.querySelectorAll('.weekday-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');

    // Update table header
    document.getElementById('currentWeekdayHeader').textContent = weekdayNames[weekday];

    loadSchedule(currentWeek, currentWeekday);
}

// Load schedule based on week and weekday
function loadSchedule(week, weekday) {
    const tbody = document.getElementById('scheduleTableBody');

    // Get events for this week and weekday
    const events = (groupedEvents[week] && groupedEvents[week][weekday]) || [];

    renderSchedule(week, weekday, events);
}

// Render schedule with Laravel data
function renderSchedule(week, weekday, events) {
    const tbody = document.getElementById('scheduleTableBody');
    let html = '';

    if (events.length > 0) {
        // Sort events by day_in_week
        events.sort((a, b) => a.day_in_week - b.day_in_week);

        events.forEach(event => {
            html += `
                <tr>
                    <th scope="row">
                        <div class="week-day-label">
                            <span class="week-number">Week ${event.week}</span>
                            <span class="day-number">Day ${event.day_in_week}</span>
                        </div>
                    </th>
                    <td ${event.has_background_image && event.background_class ?
                          'class="table-background-image-wrap ' + event.background_class + '"' :
                          event.background_color ? 'style="background-color: ' + event.background_color + '"' : ''}>
                        <h3>${event.title}</h3>
                        <p class="mb-2">${event.time_range}</p>
                        <p>By ${event.artist}</p>
                        ${event.description ? '<p class="small text-muted mt-2">' + event.description + '</p>' : ''}
                        ${event.has_background_image && event.background_class ? '<div class="section-overlay"></div>' : ''}
                    </td>
                </tr>
            `;
        });
    } else {
        html = '<tr><td colspan="2" class="text-center">No events scheduled for ' + weekdayNames[weekday] + ' in Week ' + week + '</td></tr>';
    }

    tbody.innerHTML = html;
}

// Optional: Auto-cycle through weekdays
function autoCycleWeekdays() {
    let currentIndex = weekdays.indexOf(currentWeekday);
    let nextIndex = (currentIndex + 1) % weekdays.length;

    // Simulate click on next weekday button
    const nextWeekdayBtn = document.querySelector(`[data-weekday="${weekdays[nextIndex]}"]`);
    if (nextWeekdayBtn) {
        nextWeekdayBtn.click();
    }
}

// Optional: Add keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft') previousWeek();
    if (e.key === 'ArrowRight') nextWeek();
    if (e.key === 'ArrowUp') {
        let index = weekdays.indexOf(currentWeekday);
        if (index > 0) selectWeekday(weekdays[index - 1]);
    }
    if (e.key === 'ArrowDown') {
        let index = weekdays.indexOf(currentWeekday);
        if (index < weekdays.length - 1) selectWeekday(weekdays[index + 1]);
    }
});
</script>

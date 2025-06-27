<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-active {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
        .sidebar-collapsed .sidebar-text {
            display: none;
        }
        .sidebar-collapsed .sidebar-icon {
            justify-content: center;
        }
        /* Adjustments for collapsed state to hide header texts properly */
        #sidebar.sidebar-collapsed .sidebar-header-text {
            display: none;
        }
        #sidebar.sidebar-collapsed #logo-container {
            justify-content: center; /* Center logo when collapsed */
        }
        /* Hide the logo image when sidebar is collapsed */
        #sidebar.sidebar-collapsed #logo-container img {
            display: none;
        }
        /* Ensure toggle button remains visible and functional */
        #sidebar .toggle-button-container {
            position: absolute;
            right: 0;
            top: 1rem; /* Adjusted to be at the top, matching p-4 padding */
            transform: none; /* Removed vertical centering transform */
            padding-right: 0.5rem;
        }
        #sidebar.sidebar-collapsed .toggle-button-container {
            position: static;
            transform: none;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 0.5rem 0;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-[#0C1E33] text-white flex flex-col transition-all duration-300 w-64 relative">
            <div class="p-4 border-b border-[#242639] flex items-center justify-between">
                <div id="logo-container" class="flex items-center space-x-2">
                    <img src="https://placehold.co/40x40/ffffff/000000?text=Logo" alt="Logo" class="h-10 w-10 rounded-full">
                </div>
                <div class="toggle-button-container">
                    <button onclick="toggleSidebar()" class="text-white hover:bg-gray-700 p-2 rounded-lg">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>

            <nav class="flex-1 p-4 overflow-y-auto">
                <div class="mb-6">
                    <button onclick="showSection('dashboard')" class="flex items-center space-x-3 p-3 rounded-lg sidebar-active w-full text-left transition-colors">
                        <i class="fas fa-th-large w-5 sidebar-icon"></i>
                        <span class="sidebar-text font-medium">Dashboard</span>
                    </button>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">MANAGEMENT</h3>
                    <div class="space-y-2">
                        <button onclick="showSection('course-management')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-book w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Course Management</span>
                        </button>
                        <button onclick="showSection('assignments')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-file-alt w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Assignments</span>
                        </button>
                        <button onclick="showSection('quizzes')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-question-circle w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Quizzes</span>
                        </button>
                        <button onclick="showSection('progress-tracking')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-chart-line w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Student Progress</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">RESOURCES & COMMS</h3>
                    <div class="space-y-2">
                        <button onclick="showSection('notifications')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-bell w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Notifications</span>
                        </button>
                        </button>
                    </div>
                </div>
            </nav>

            <div class="p-4 border-t border-gray-700">
                <!-- Retained Laravel Blade syntax for logout as per original, user may adjust -->
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                        <i class="fas fa-sign-out-alt w-5 sidebar-icon"></i>
                        <span class="sidebar-text">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
            <header class="bg-white shadow-sm border-b border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-1 max-w-2xl">
                        <div class="relative">
                            <input type="text" placeholder="Search for courses, assignments, or students..."
                                class="w-full pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                            </button>
                        </div>

                        <div class="relative">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">!</span>
                            </button>
                        </div>

                        <div class="flex items-center space-x-2">
                            <img src="https://images.unsplash.com/photo-1579783900882-c0d3ce7dfc4f?w=32&h=32&fit=crop&crop=face&facepad=2&rounded-full"
                                alt="Admin Profile" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-700">Teacher User</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section active">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex items-start justify-between mb-6">
                                    <div>
                                        <h1 class="text-3xl font-bold text-gray-900 flex items-center mb-1">
                                            <span class="mr-3 text-4xl leading-none">👋</span> Welcome, Teacher!
                                        </h1>
                                        <p class="text-gray-600 mt-1 text-lg">{{ date('d F Y, l') }}</p>
                                    </div>
                                    <div class="text-right bg-blue-100 text-blue-800 px-4 py-2 rounded-lg shadow-sm">
                                        <div class="text-sm font-medium">Active Courses</div>
                                        <div class="text-xl font-bold">4</div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 mb-6 shadow-md">
                                    <div class="flex flex-col md:flex-row items-center justify-between">
                                        <div class="mb-4 md:mb-0 md:mr-6 flex-1">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">New Progress Tracking Tools!</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed">
                                                We've rolled out enhanced student progress tracking features. <br class="hidden sm:inline"> Now you can dive deeper into individual and class performance.
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="w-32 h-24 bg-white rounded-xl flex items-center justify-center shadow-inner">
                                                <i class="fas fa-chart-area text-4xl text-blue-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                                        <i class="fas fa-book-reader mr-3 text-blue-600"></i>
                                        My Courses
                                    </h2>
                                    <a href="#" onclick="showSection('course-management'); return false;" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center group">
                                        Manage all <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-center justify-between mb-3">
                                            <h3 class="font-semibold text-gray-900">Web Development I</h3>
                                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Fall 2025</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-3">Total Students: 35</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500">Pending Grades: 5</span>
                                            <a href="#" onclick="showSection('assignments'); return false;" class="text-blue-600 hover:underline text-sm">Grade</a>
                                        </div>
                                    </div>

                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-center justify-between mb-3">
                                            <h3 class="font-semibold text-gray-900">Data Structures & Algorithms</h3>
                                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Fall 2025</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-3">Total Students: 28</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500">Pending Grades: 8</span>
                                            <a href="#" onclick="showSection('assignments'); return false;" class="text-blue-600 hover:underline text-sm">Grade</a>
                                        </div>
                                    </div>

                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-center justify-between mb-3">
                                            <h3 class="font-semibold text-gray-900">Database Systems</h3>
                                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Spring 2026</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-3">Total Students: 42</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500">Pending Grades: 12</span>
                                            <a href="#" onclick="showSection('assignments'); return false;" class="text-blue-600 hover:underline text-sm">Grade</a>
                                        </div>
                                    </div>

                                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-center justify-between mb-3">
                                            <h3 class="font-semibold text-gray-900">Mobile Application Development</h3>
                                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Spring 2026</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-3">Total Students: 20</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500">Pending Grades: 3</span>
                                            <a href="#" onclick="showSection('assignments'); return false;" class="text-blue-600 hover:underline text-sm">Grade</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-semibold text-gray-900">January 2024</h3>
                                    <div class="flex space-x-2">
                                        <button class="p-1 hover:bg-gray-100 rounded">
                                            <i class="fas fa-chevron-left text-gray-400"></i>
                                        </button>
                                        <button class="p-1 hover:bg-gray-100 rounded">
                                            <i class="fas fa-chevron-right text-gray-400"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-7 gap-1 text-center text-sm">
                                    <div class="py-2 text-gray-500 font-medium">Mo</div>
                                    <div class="py-2 text-gray-500 font-medium">Tu</div>
                                    <div class="py-2 text-gray-500 font-medium">We</div>
                                    <div class="py-2 text-gray-500 font-medium">Th</div>
                                    <div class="py-2 text-gray-500 font-medium">Fr</div>
                                    <div class="py-2 text-gray-500 font-medium">Sa</div>
                                    <div class="py-2 text-gray-500 font-medium">Su</div>

                                    <div class="py-2 text-gray-400">1</div>
                                    <div class="py-2">2</div>
                                    <div class="py-2">3</div>
                                    <div class="py-2">4</div>
                                    <div class="py-2 text-blue-600 font-semibold">5</div>
                                    <div class="py-2">6</div>
                                    <div class="py-2">7</div>
                                    <div class="py-2">8</div>
                                    <div class="py-2">9</div>
                                    <div class="py-2">10</div>
                                    <div class="py-2">11</div>
                                    <div class="py-2 bg-blue-600 text-white rounded">12</div>
                                    <div class="py-2 text-blue-600 font-semibold">13</div>
                                    <div class="py-2">14</div>
                                    <div class="py-2">15</div>
                                    <div class="py-2">16</div>
                                    <div class="py-2">17</div>
                                    <div class="py-2">18</div>
                                    <div class="py-2 text-blue-600 font-semibold">19</div>
                                    <div class="py-2 text-blue-600 font-semibold">20</div>
                                    <div class="py-2">21</div>
                                    <div class="py-2">22</div>
                                    <div class="py-2">23</div>
                                    <div class="py-2">24</div>
                                    <div class="py-2">25</div>
                                    <div class="py-2 text-blue-600 font-semibold">26</div>
                                    <div class="py-2 text-blue-600 font-semibold">27</div>
                                    <div class="py-2">28</div>
                                    <div class="py-2">29</div>
                                    <div class="py-2">30</div>
                                    <div class="py-2">31</div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-semibold text-gray-900 flex items-center">
                                        <i class="fas fa-calendar-check mr-3 text-purple-600"></i>
                                        Upcoming Deadlines & Events
                                    </h3>
                                    <a href="#" onclick="showSection('assignments'); return false;" class="text-purple-600 hover:text-purple-700 text-sm font-medium flex items-center group">
                                        View all <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>

                                <div class="space-y-4">
                                    <div class="border-l-4 border-orange-400 bg-orange-50 p-4 rounded-r-lg shadow-sm">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-medium text-gray-900">Web Dev I - Assignment 2</h4>
                                            <span class="text-xs bg-orange-100 text-orange-800 px-2 py-1 rounded-full font-medium">Grade Due</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-2">Final project submissions for grading.</p>
                                        <p class="text-xs text-gray-500">Due Date: February 10, 2025</p>
                                    </div>

                                    <div class="border-l-4 border-blue-400 bg-blue-50 p-4 rounded-r-lg shadow-sm">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-medium text-gray-900">Data Structures - Quiz 3</h4>
                                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full font-medium">Publish Soon</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-2">Review quiz questions before publishing.</p>
                                        <p class="text-xs text-gray-500">Scheduled: February 15, 2025</p>
                                    </div>

                                    <div class="border-l-4 border-green-400 bg-green-50 p-4 rounded-r-lg shadow-sm">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-medium text-gray-900">Mobile Dev - Project Proposal</h4>
                                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full font-medium">Review Period</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">Review student project proposals.</p>
                                        <p class="text-xs text-gray-500">Ends: February 12, 2025</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Management Section -->
                <div id="course-management-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Course Management</h1>
                        <p class="text-gray-600">Create and edit course content, manage course assignments, and set grades for your classes.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition-shadow border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Web Development I</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Active</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Manage syllabus, lectures, discussions, and overall course structure.</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 35 Students Enrolled</li>
                                <li><i class="fas fa-clipboard-list mr-2 text-gray-500"></i> 8 Assignments</li>
                                <li><i class="fas fa-question-circle mr-2 text-gray-500"></i> 4 Quizzes</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    Edit Course
                                </button>
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-cogs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition-shadow border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-900">Data Structures & Algorithms</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Active</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Oversee all content, student submissions, and analytics for this course.</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 28 Students Enrolled</li>
                                <li><i class="fas fa-clipboard-list mr-2 text-gray-500"></i> 6 Assignments</li>
                                <li><i class="fas fa-question-circle mr-2 text-gray-500"></i> 3 Quizzes</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                                    Edit Course
                                </button>
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-cogs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition-shadow border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-900">Database Systems</h3>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium">Upcoming</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Prepare and publish course materials, set up assignments and quizzes.</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 42 Students (Pre-enrolled)</li>
                                <li><i class="fas fa-clipboard-list mr-2 text-gray-500"></i> 0 Assignments Set</li>
                                <li><i class="fas fa-question-circle mr-2 text-gray-500"></i> 0 Quizzes Set</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 transition-colors text-sm font-semibold">
                                    Prepare Course
                                </button>
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-cogs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition-shadow border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-900">Mobile Application Development</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Active</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Track project progress, provide feedback, and manage discussions.</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 20 Students Enrolled</li>
                                <li><i class="fas fa-code mr-2 text-gray-500"></i> 5 Projects</li>
                                <li><i class="fas fa-comments mr-2 text-gray-500"></i> 2 Discussion Forums</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Edit Course
                                </button>
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-cogs"></i>
                                </button>
                            </div>
                        </div>
                        <button class="lg:col-span-3 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-plus-circle"></i> <span>Create New Course</span>
                        </button>
                    </div>
                </div>

                <!-- Assignments Section -->
                <div id="assignments-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Assignments</h1>
                        <p class="text-gray-600">Create, assign deadlines, and grade submissions for all your assignments.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Web Development I - Design Project 1</h3>
                                    <p class="text-gray-600 text-sm">Grade student submissions for responsive website design.</p>
                                </div>
                                <span class="text-xs bg-orange-100 text-orange-800 px-3 py-1 rounded-full font-medium flex-shrink-0">5 Pending Grades</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Due Date: <span class="font-medium text-gray-900">February 10, 2025</span></p>
                                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold w-full sm:w-auto">
                                    Grade Submissions
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Data Structures & Algorithms - Algorithm Analysis Homework</h3>
                                    <p class="text-gray-600 text-sm">Review and provide feedback on algorithm efficiency.</p>
                                </div>
                                <span class="text-xs bg-red-100 text-red-800 px-3 py-1 rounded-full font-medium flex-shrink-0">8 Pending Grades</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Due Date: <span class="font-medium text-gray-900">March 5, 2025</span></p>
                                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold w-full sm:w-auto">
                                    Grade Submissions
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Database Systems - SQL Query Optimization</h3>
                                    <p class="text-gray-600 text-sm">Assignment questions and criteria are prepared.</p>
                                </div>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Draft</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Publish Date: <span class="font-medium text-gray-900">April 1, 2025</span></p>
                                <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold w-full sm:w-auto">
                                    Publish Assignment
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Mobile Application Development - Project Midterm Review</h3>
                                    <p class="text-gray-600 text-sm">Review student project progress and provide feedback.</p>
                                </div>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium flex-shrink-0">3 Reviewed</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Review Period: <span class="font-medium text-gray-900">May 1-5, 2025</span></p>
                                <button class="bg-gray-400 text-white px-6 py-2 rounded-lg cursor-not-allowed text-sm font-semibold w-full sm:w-auto opacity-75">
                                    View Reviews
                                </button>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-plus-circle"></i> <span>Create New Assignment</span>
                        </button>
                    </div>
                </div>

                <!-- Quizzes Section -->
                <div id="quizzes-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Quizzes</h1>
                        <p class="text-gray-600">Create quizzes, assign them to students, and grade quiz responses.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Web Development I - HTML/CSS Basics Quiz</h3>
                                    <p class="text-gray-600 text-sm">Review student scores and identify areas for improvement.</p>
                                </div>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Graded</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Date Administered: <span class="font-medium text-gray-900">January 20, 2025</span></p>
                                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold w-full sm:w-auto">
                                    View Results
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Data Structures & Algorithms - Linked Lists Quiz</h3>
                                    <p class="text-gray-600 text-sm">Currently open for students to complete.</p>
                                </div>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Active</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Closes: <span class="font-medium text-gray-900">February 28, 2025</span></p>
                                <button class="bg-orange-600 text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition-colors text-sm font-semibold w-full sm:w-auto">
                                    Monitor Progress
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Database Systems - Normalization Quiz</h3>
                                    <p class="text-gray-600 text-sm">Quiz questions and settings are prepared.</p>
                                </div>
                                <span class="text-xs bg-purple-100 text-purple-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Ready to Publish</span>
                            </div>
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-3 sm:mb-0">Scheduled: <span class="font-medium text-gray-900">April 15, 2025</span></p>
                                <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold w-full sm:w-auto">
                                    Publish Quiz
                                </button>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-plus-circle"></i> <span>Create New Quiz</span>
                        </button>
                    </div>
                </div>

                <!-- Progress Tracking Section -->
                <div id="progress-tracking-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Progress Tracking</h1>
                        <p class="text-gray-600">View and track individual student progress for the courses you teach.</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6 mb-4 border border-gray-200">
                        <h2 class="text-xl font-semibold mb-3 text-gray-900">Overall Class Performance</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Average Assignment Score</p>
                                <p class="text-2xl font-bold text-blue-600">88%</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Average Quiz Score</p>
                                <p class="text-2xl font-bold text-purple-600">82%</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">Detailed course reports are available in the Reports section.</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h2 class="text-xl font-semibold mb-3 text-gray-900">Individual Student Performance</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Latest Grade</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Overall Status</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Web Development I</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">85% (A-)</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Good Progress
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Data Structures & Algorithms</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">72% (C+)</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Needs Attention
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View Details</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Michael Brown</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Mobile Application Development</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">91% (A)</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Excellent
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View Details</a>
                                        </td>
                                    </tr>
                                    <!-- More rows for students can be added here -->
                                </tbody>
                            </table>
                        </div>
                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md mt-6">
                            <i class="fas fa-users-cog"></i> <span>Manage All Students</span>
                        </button>
                    </div>
                </div>

                <!-- Notifications Section -->
                <div id="notifications-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Notifications</h1>
                        <p class="text-gray-600">Send class-specific notifications (e.g., homework reminders, announcements).</p>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4 border-l-4 border-blue-500 hover:shadow-lg transition-shadow">
                            <div class="flex-shrink-0">
                                <i class="fas fa-bullhorn text-blue-500 text-2xl"></i>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">New Assignment Submitted for Web Development I</h3>
                                <p class="text-gray-700 text-sm">John Doe submitted "Design Project 1". <span class="text-xs text-gray-500 ml-2">2 minutes ago</span></p>
                                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">View Submission</button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4 border-l-4 border-green-500 hover:shadow-lg transition-shadow">
                            <div class="flex-shrink-0">
                                <i class="fas fa-envelope-open-text text-green-500 text-2xl"></i>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">New Message Received from Jane Smith</h3>
                                <p class="text-gray-700 text-sm">Regarding "Data Structures & Algorithms" course. <span class="text-xs text-gray-500 ml-2">1 hour ago</span></p>
                                <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">Read Message</button>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4 border-l-4 border-orange-500 hover:shadow-lg transition-shadow">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-orange-500 text-2xl"></i>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Grading Deadline Approaching</h3>
                                <p class="text-gray-700 text-sm">Deadline for "Web Development I - Assignment 2" is approaching. <span class="text-xs text-gray-500 ml-2">Tomorrow</span></p>
                                <button class="mt-3 bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors text-sm font-semibold">Grade Now</button>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-paper-plane"></i> <span>Send New Announcement</span>
                        </button>
                    </div>
                </div>


    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-20'); // Adjust this width for collapsed state
            sidebar.classList.toggle('sidebar-collapsed');
        }

        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });

            // Remove active state from all sidebar buttons
            document.querySelectorAll('#sidebar button').forEach(button => {
                button.classList.remove('sidebar-active');
            });

            // Show the selected section
            document.getElementById(`${sectionId}-section`).classList.add('active');

            // Add active state to the clicked sidebar button
            event.currentTarget.classList.add('sidebar-active');
        }

        // Set initial active state for dashboard on page load
        document.addEventListener('DOMContentLoaded', () => {
            const dashboardButton = document.querySelector('#sidebar button[onclick="showSection(\'dashboard\')"]');
            if (dashboardButton) {
                dashboardButton.classList.add('sidebar-active');
            }
        });
    </script>
</body>
</html>
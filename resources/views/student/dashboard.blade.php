<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5F7FA; /* Light Grey Blue */
        }
        .sidebar-active {
            background-color: rgba(255, 255, 255, 0.15); /* Slightly more prominent active state */
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
        .sidebar-collapsed .sidebar-text,
        .sidebar-collapsed .sidebar-header-text {
            display: none;
        }
        .sidebar-collapsed .sidebar-icon {
            margin-right: 0 !important;
            width: auto;
            justify-content: center;
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
        /* General card styling */
        .card {
            background-color: #ffffff;
            border-radius: 0.75rem; /* rounded-xl */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* shadow-sm */
            padding: 1.5rem; /* p-6 */
            border: 1px solid #E5E7EB; /* border-gray-200 */
        }
        .card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); /* shadow-lg */
        }
        /* Custom scrollbar styling for sidebar navigation */
        #sidebar nav {
            overflow-y: auto; /* Re-enable scrollbar */
        }
        #sidebar nav::-webkit-scrollbar {
            width: 8px; /* Width of the scrollbar */
        }
        #sidebar nav::-webkit-scrollbar-track {
            background: #1A2B42; /* Color of the scrollbar track (slightly lighter than sidebar) */
            border-radius: 10px;
        }
        #sidebar nav::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2); /* Color of the scrollbar thumb */
            border-radius: 10px;
            border: 2px solid #1A2B42; /* Padding around the thumb */
        }
        #sidebar nav::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Color of the thumb on hover */
        }
        /* Firefox scrollbar styling */
        #sidebar nav {
            scrollbar-width: thin; /* "auto" or "thin" */
            scrollbar-color: rgba(255, 255, 255, 0.2) #1A2B42; /* thumb color track color */
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <div id="sidebar" class="bg-[#0C1E33] text-white flex flex-col transition-all duration-300 w-64 relative">
            <div class="p-4 border-b border-[#242639] flex items-center justify-between">
                <div id="logo-container" class="flex items-center space-x-2">
                    <img src="https://placehold.co/40x40/ffffff/000000?text=SD" alt="Student Logo" class="h-10 w-10 rounded-full">
                </div>
                <div class="toggle-button-container">
                    <button onclick="toggleSidebar()" class="text-white hover:bg-gray-700 p-2 rounded-lg">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>

            <nav class="flex-1 p-4">
                <div class="mb-6">
                    <button onclick="showSection('dashboard')" class="flex items-center space-x-3 p-3 rounded-lg sidebar-active w-full text-left transition-colors">
                        <i class="fas fa-chart-pie w-5 sidebar-icon"></i>
                        <span class="sidebar-text font-medium">Dashboard</span>
                    </button>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">ACADEMICS</h3>
                    <div class="space-y-2">
                        <button onclick="showSection('course-enrollment')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-book-open w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Course Enrollment</span>
                        </button>
                        <button onclick="showSection('course-materials')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-folder-open w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Course Materials</span>
                        </button>
                        <button onclick="showSection('assignments')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-tasks w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Assignments</span>
                        </button>
                        <button onclick="showSection('quizzes')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-question-circle w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Quizzes</span>
                        </button>
                        <button onclick="showSection('progress-tracking')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-chart-line w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Progress Tracking</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">COMMUNICATION</h3>
                    <div class="space-y-2">
                        <button onclick="showSection('notifications')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-bell w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Notifications</span>
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

        <div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
            <header class="bg-white shadow-sm border-b border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div class="flex-1 max-w-2xl">
                        <div class="relative">
                            <input type="text" placeholder="Search courses, assignments, quizzes..."
                                class="w-full pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
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
                            <span class="text-sm font-medium text-gray-700">Student User</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                <div id="dashboard-section" class="section active">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="card">
                                <div class="flex items-start justify-between mb-6">
                                    <div>
                                        <h1 class="text-3xl font-bold text-gray-900 flex items-center mb-1">
                                            <span class="mr-3 text-4xl leading-none">👋</span> Welcome, Student!
                                        </h1>
                                        <p id="dashboard-date" class="text-gray-600 mt-1 text-lg">Here's your overview of courses, assignments, and grades.</p>
                                    </div>
                                    <div class="text-right bg-blue-100 text-blue-800 px-4 py-2 rounded-lg shadow-sm w-20 h-20">
                                        <div class="text-sm font-medium">Enrolled Courses</div>
                                        <div class="text-xl font-bold">4</div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                    <div class="bg-purple-50 rounded-lg p-4 flex items-center space-x-3">
                                        <i class="fas fa-clipboard-list text-2xl text-purple-600"></i>
                                        <div>
                                            <p class="text-sm text-gray-600">Upcoming Assignments</p>
                                            <p class="text-xl font-bold text-gray-900">3</p>
                                        </div>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-4 flex items-center space-x-3">
                                        <i class="fas fa-receipt text-2xl text-green-600"></i>
                                        <div>
                                            <p class="text-sm text-gray-600">Average Grade</p>
                                            <p class="text-xl font-bold text-gray-900">B+</p>
                                        </div>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 flex items-center space-x-3">
                                        <i class="fas fa-stopwatch text-2xl text-red-600"></i>
                                        <div>
                                            <p class="text-sm text-gray-600">Pending Quizzes</p>
                                            <p class="text-xl font-bold text-gray-900">1</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 mb-6 shadow-md">
                                    <div class="flex flex-col md:flex-row items-center justify-between">
                                        <div class="mb-4 md:mb-0 md:mr-6 flex-1">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Your Weekly Study Goals</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed">
                                                You're on track to complete "Intro to AI" this month! Keep up the great work.
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="w-32 h-24 bg-white rounded-xl flex items-center justify-center shadow-inner">
                                                <i class="fas fa-trophy text-4xl text-yellow-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                                        <i class="fas fa-bell mr-3 text-blue-600"></i>
                                        Recent Announcements
                                    </h2>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center group" onclick="showSection('notifications'); return false;">
                                        View all <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center space-x-3 text-sm text-gray-700">
                                        <i class="fas fa-bullhorn text-indigo-500"></i>
                                        <span>New lecture notes for 'Web Dev I' posted.</span>
                                        <span class="ml-auto text-xs text-gray-500">10 mins ago</span>
                                    </li>
                                    <li class="flex items-center space-x-3 text-sm text-gray-700">
                                        <i class="fas fa-calendar-alt text-green-500"></i>
                                        <span>Reminder: Data Structures Assignment 2 due tomorrow!</span>
                                        <span class="ml-auto text-xs text-gray-500">2 hours ago</span>
                                    </li>
                                    <li class="flex items-center space-x-3 text-sm text-gray-700">
                                        <i class="fas fa-circle-info text-yellow-500"></i>
                                        <span>System maintenance this weekend (no access Sat 10-12 AM).</span>
                                        <span class="ml-auto text-xs text-gray-500">Yesterday</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="card">
                                <h3 class="font-semibold text-gray-900 mb-4">Upcoming Deadlines</h3>
                                <div class="space-y-3">
                                    <div class="border-l-4 border-red-500 pl-3 py-1">
                                        <p class="text-sm font-medium text-gray-900">Data Structures - Assignment 2</p>
                                        <p class="text-xs text-gray-600">Due: Jul 1, 2025</p>
                                    </div>
                                    <div class="border-l-4 border-yellow-500 pl-3 py-1">
                                        <p class="text-sm font-medium text-gray-900">Intro to AI - Quiz 1</p>
                                        <p class="text-xs text-gray-600">Due: Jul 5, 2025</p>
                                    </div>
                                    <div class="border-l-4 border-blue-500 pl-3 py-1">
                                        <p class="text-sm font-medium text-gray-900">Web Dev I - Project Proposal</p>
                                        <p class="text-xs text-gray-600">Due: Jul 8, 2025</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h3 class="font-semibold text-gray-900 mb-4">Quick Links</h3>
                                <div class="grid grid-cols-2 gap-3">
                                    <button onclick="showSection('course-materials')" class="bg-blue-100 text-blue-800 py-2 rounded-lg hover:bg-blue-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-folder-open"></i> <span>Materials</span>
                                    </button>
                                    <button onclick="showSection('assignments')" class="bg-green-100 text-green-800 py-2 rounded-lg hover:bg-green-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-tasks"></i> <span>Assignments</span>
                                    </button>
                                    <button onclick="showSection('quizzes')" class="bg-purple-100 text-purple-800 py-2 rounded-lg hover:bg-purple-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-clipboard-question"></i> <span>Quizzes</span>
                                    </button>
                                    <button onclick="showSection('progress-tracking')" class="bg-orange-100 text-orange-800 py-2 rounded-lg hover:bg-orange-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-chart-line"></i> <span>Progress</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="course-enrollment-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Course Enrollment</h1>
                        <p class="text-gray-600">Browse and enroll in new courses, or access materials for courses you're already taking.</p>
                    </div>

                    <div class="card mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">My Enrolled Courses</h2>
                        <div class="space-y-4">
                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">Web Development I</p>
                                    <p class="text-sm text-gray-600">Mr. Smith</p>
                                </div>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    Access Course
                                </button>
                            </div>
                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">Data Structures & Algorithms</p>
                                    <p class="text-sm text-gray-600">Ms. Davis</p>
                                </div>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    Access Course
                                </button>
                            </div>
                            <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">Introduction to AI</p>
                                    <p class="text-sm text-gray-600">Dr. Johnson</p>
                                </div>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    Access Course
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Available Courses</h2>
                        <div class="relative mb-4">
                            <input type="text" placeholder="Search available courses..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="font-medium text-gray-900 mb-1">Advanced Database Systems</h3>
                                <p class="text-sm text-gray-600 mb-2">Teacher: Dr. Patel</p>
                                <p class="text-xs text-gray-500 mb-3">Learn advanced concepts in database design and management.</p>
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Enroll Now
                                </button>
                            </div>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="font-medium text-gray-900 mb-1">Cybersecurity Fundamentals</h3>
                                <p class="text-sm text-gray-600 mb-2">Teacher: Ms. Rodriguez</p>
                                <p class="text-xs text-gray-500 mb-3">Introduction to cybersecurity principles and practices.</p>
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Enroll Now
                                </button>
                            </div>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h3 class="font-medium text-gray-900 mb-1">Mobile App Development</h3>
                                <p class="text-sm text-gray-600 mb-2">Teacher: Mr. Lee</p>
                                <p class="text-xs text-gray-500 mb-3">Develop cross-platform mobile applications.</p>
                                <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Enroll Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="course-materials-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Course Materials</h1>
                        <p class="text-gray-600">Access and download all your course materials here.</p>
                    </div>

                    <div class="card mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Web Development I</h2>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between border border-gray-200 rounded-lg p-3">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-file-pdf text-red-500"></i>
                                    <span class="text-sm text-gray-800">Lecture 1: HTML Basics.pdf</span>
                                </div>
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-300 transition-colors text-xs font-medium">
                                    Download
                                </button>
                            </div>
                            <div class="flex items-center justify-between border border-gray-200 rounded-lg p-3">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-video text-blue-500"></i>
                                    <span class="text-sm text-gray-800">Video: CSS Flexbox Tutorial.mp4</span>
                                </div>
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-300 transition-colors text-xs font-medium">
                                    Download
                                </button>
                            </div>
                            <div class="flex items-center justify-between border border-gray-200 rounded-lg p-3">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-file-powerpoint text-orange-500"></i>
                                    <span class="text-sm text-gray-800">Lecture 2 Slides: Responsive Design.pptx</span>
                                </div>
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-300 transition-colors text-xs font-medium">
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Data Structures & Algorithms</h2>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between border border-gray-200 rounded-lg p-3">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-file-alt text-gray-500"></i>
                                    <span class="text-sm text-gray-800">Reading: Introduction to Big O Notation.pdf</span>
                                </div>
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-300 transition-colors text-xs font-medium">
                                    Download
                                </button>
                            </div>
                            <div class="flex items-center justify-between border border-gray-200 rounded-lg p-3">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-code text-purple-500"></i>
                                    <span class="text-sm text-gray-800">Code Samples: Linked Lists.zip</span>
                                </div>
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-300 transition-colors text-xs font-medium">
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="assignments-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Assignments</h1>
                        <p class="text-gray-600">View your assignments, track deadlines, and submit your work.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Web Development I - Project Proposal</h3>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium">Due: Jul 8, 2025</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Course: Web Development I | Teacher: Mr. Smith</p>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                                <span class="text-sm text-orange-600 font-semibold">Status: Not Submitted</span>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    View Details & Submit
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Data Structures & Algorithms - Assignment 2</h3>
                                <span class="text-xs bg-red-100 text-red-800 px-3 py-1 rounded-full font-medium">Due: Jul 1, 2025</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Course: Data Structures & Algorithms | Teacher: Ms. Davis</p>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                                <span class="text-sm text-red-600 font-semibold">Status: Not Submitted (Overdue)</span>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    View Details & Submit
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Intro to AI - Essay on Ethical AI</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Submitted: Jun 20, 2025</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Course: Introduction to AI | Teacher: Dr. Johnson</p>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                                <span class="text-sm text-green-600 font-semibold">Status: Graded (92/100)</span>
                                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                                    Review Feedback
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="quizzes-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Quizzes</h1>
                        <p class="text-gray-600">Take assigned quizzes and review your results.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Intro to AI - Quiz 1: AI Concepts</h3>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium">Closes: Jul 5, 2025</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Course: Introduction to AI | Teacher: Dr. Johnson</p>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                                <span class="text-sm text-orange-600 font-semibold">Status: Pending</span>
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    Start Quiz
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Web Development I - HTML Basics Quiz</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Completed: Jun 15, 2025</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Course: Web Development I | Teacher: Mr. Smith</p>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                                <span class="text-sm text-green-600 font-semibold">Your Score: 85%</span>
                                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                                    View Results & Feedback
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-900">Data Structures & Algorithms - Data Types Quiz</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Completed: Jun 10, 2025</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4">Course: Data Structures & Algorithms | Teacher: Ms. Davis</p>
                            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                                <span class="text-sm text-green-600 font-semibold">Your Score: 78%</span>
                                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                                    View Results & Feedback
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="progress-tracking-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Progress Tracking</h1>
                        <p class="text-gray-600">Track your progress in each course, see completed lessons, assignments, and overall grades.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="card">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4">Course Progress Overview</h2>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <p class="text-sm font-medium text-gray-900">Web Development I</p>
                                        <span class="text-sm text-blue-600 font-semibold">75% Completed</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <p class="text-sm font-medium text-gray-900">Data Structures & Algorithms</p>
                                        <span class="text-sm text-purple-600 font-semibold">60% Completed</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <p class="text-sm font-medium text-gray-900">Introduction to AI</p>
                                        <span class="text-sm text-green-600 font-semibold">90% Completed</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4">Detailed Grades</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Web Development I</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">HTML Basics Quiz</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">85/100</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Graded
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Intro to AI</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Essay on Ethical AI</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">92/100</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Graded
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Data Structures & Algorithms</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Assignment 2</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">--</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                    Pending
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md mt-6">
                                <i class="fas fa-list-ol"></i> <span>View Full Gradebook</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="notifications-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Notifications</h1>
                        <p class="text-gray-600">Stay up-to-date with important announcements and deadlines.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="card flex items-start space-x-4 border-l-4 border-red-500">
                            <i class="fas fa-calendar-times text-red-500 text-2xl mt-1"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Assignment Due Soon: Data Structures Assignment 2</h3>
                                <p class="text-gray-700 text-sm">This assignment is due tomorrow, July 1, 2025. Don't forget to submit!</p>
                                <span class="text-xs text-gray-500 mt-1 block">Received: 10 hours ago | Course: Data Structures & Algorithms</span>
                            </div>
                        </div>

                        <div class="card flex items-start space-x-4 border-l-4 border-blue-500">
                            <i class="fas fa-bullhorn text-blue-500 text-2xl mt-1"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">New Lecture Notes Available for Web Dev I</h3>
                                <p class="text-gray-700 text-sm">Lecture notes on "Advanced CSS Layouts" have been uploaded. Find them in Course Materials.</p>
                                <span class="text-xs text-gray-500 mt-1 block">Received: 5 hours ago | Course: Web Development I</span>
                            </div>
                        </div>

                        <div class="card flex items-start space-x-4 border-l-4 border-yellow-500">
                            <i class="fas fa-triangle-exclamation text-yellow-500 text-2xl mt-1"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Platform Maintenance Scheduled</h3>
                                <p class="text-gray-700 text-sm">The platform will undergo maintenance on Saturday, July 5th from 10:00 AM to 12:00 PM PST. Access may be interrupted.</p>
                                <span class="text-xs text-gray-500 mt-1 block">Received: Yesterday | System-wide</span>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
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

        // Set current date on dashboard load and initial active state
        document.addEventListener('DOMContentLoaded', () => {
            const dashboardButton = document.querySelector('#sidebar button[onclick="showSection(\'dashboard\')"]');
            if (dashboardButton) {
                dashboardButton.classList.add('sidebar-active');
            }

            const dashboardDateElement = document.getElementById('dashboard-date');
            if (dashboardDateElement) {
                const currentDate = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                // Assuming the base text is "Here's your overview of courses, assignments, and grades."
                // I'm prepending a space for cleaner concatenation.
                dashboardDateElement.textContent = `Here's your overview of courses, assignments, and grades. Today is ${currentDate}.`;
            }
        });
    </script>
</body>
</html>
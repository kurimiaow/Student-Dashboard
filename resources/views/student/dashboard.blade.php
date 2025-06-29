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
        /* Sections are no longer directly managed by display:none/block here.
           Their content is loaded dynamically into #main-content-area.
           The .section class can still be useful if individual loaded content
           files use it for internal styling or JS, but not for the top-level display.
        */
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
        /* General card styling (might be used in loaded sections) */
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
        <!-- Sidebar -->
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
            <button onclick="loadSection('dashboard')" class="flex items-center space-x-4 p-3 rounded-lg sidebar-active w-full text-left transition-colors">
                <i class="fas fa-chart-pie w-5 sidebar-icon"></i>
                <span class="sidebar-text font-medium">Dashboard</span>
            </button>
        </div>

        <div class="mb-6">
            <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">ACADEMICS</h3>
            <div class="space-y-2">
                <button onclick="loadSection('course-enrollment')" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                    <i class="fas fa-book-open w-5 sidebar-icon"></i>
                    <span class="sidebar-text">Course Enrollment</span>
                </button>
                <button onclick="loadSection('course-materials')" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                    <i class="fas fa-folder-open w-5 sidebar-icon"></i>
                    <span class="sidebar-text">Course Materials</span>
                </button>
                <button onclick="loadSection('assignments')" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                    <i class="fas fa-tasks w-5 sidebar-icon"></i>
                    <span class="sidebar-text">Assignments</span>
                </button>
                <button onclick="loadSection('quizzes')" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                    <i class="fas fa-question-circle w-5 sidebar-icon"></i>
                    <span class="sidebar-text">Quizzes</span>
                </button>
                <button onclick="loadSection('progress-tracking')" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                    <i class="fas fa-chart-line w-5 sidebar-icon"></i>
                    <span class="sidebar-text">Progress Tracking</span>
                </button>
            </div>
        </div>

        <div class="mb-6">
                <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">COMMUNICATION</h3>
                <div class="space-y-2">
                    <button onclick="loadSection('notifications')" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                        <i class="fas fa-bell w-5 sidebar-icon"></i>
                        <span class="sidebar-text">Notifications</span>
                    </button>
                </div>
            </div>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <button type="button" onclick="window.location.href = 'student-login-page.html';" class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                <i class="fas fa-sign-out-alt w-5 sidebar-icon"></i>
                <span class="sidebar-text">Logout</span>
            </button>
        </div>
    </div>

        <!-- Main Content Area -->
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
                                alt="Student Profile" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-700">Student User</span>
                        </div>
                    </div>
                </div>
            </header>

            <main id="main-content-area" class="flex-1 overflow-y-auto p-6 space-y-10">
                {{-- Include each Blade section directly --}}
                @include('student.sections.dashboard')
                @include('student.sections.course-enrollment')
                @include('student.sections.course-materials')
                @include('student.sections.assignments')
                @include('student.sections.quizzes')
                @include('student.sections.progress-tracking')
                @include('student.sections.notifications')
            </main>


 <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20');
        sidebar.classList.toggle('sidebar-collapsed');
    }

    function loadSection(sectionId) {
        // Hide all sections
        document.querySelectorAll('.section').forEach(section => {
            section.classList.add('hidden');
        });

        // Show the selected section
        const sectionToShow = document.getElementById(`${sectionId}-section`);
        if (sectionToShow) {
            sectionToShow.classList.remove('hidden');
        }

        // Update sidebar active button
        document.querySelectorAll('#sidebar button').forEach(button => {
            button.classList.remove('sidebar-active');
        });
        const activeButton = document.querySelector(`#sidebar button[onclick="loadSection('${sectionId}')"]`);
        if (activeButton) {
            activeButton.classList.add('sidebar-active');
        }
    }

    // Show dashboard by default
    document.addEventListener('DOMContentLoaded', () => {
        loadSection('dashboard');
    });
</script>
</body>
</html>
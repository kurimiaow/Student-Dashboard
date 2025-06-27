<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        <!-- Sidebar -->
        <div id="sidebar" class="bg-[#0C1E33] text-white flex flex-col transition-all duration-300 w-64 relative">
            <div class="p-4 border-b border-[#242639] flex items-center justify-between">
                <div id="logo-container" class="flex items-center space-x-2">
                    <img src="https://placehold.co/40x40/ffffff/000000?text=AD" alt="Admin Logo" class="h-10 w-10 rounded-full">
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
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">ADMINISTRATION</h3>
                    <div class="space-y-2">
                        <button onclick="showSection('manage-users')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-users-cog w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Manage Users</span>
                        </button>
                        <button onclick="showSection('course-management')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-book-open w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Course Management</span>
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
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold sidebar-text tracking-wide sidebar-header-text">SYSTEM & COMMS</h3>
                    <div class="space-y-2">
                        <button onclick="showSection('notifications')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-bullhorn w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Notifications</span>
                        </button>
                        <button onclick="showSection('reports')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-file-invoice w-5 sidebar-icon"></i>
                            <span class="sidebar-text">Reports</span>
                        </button>
                        <button onclick="showSection('system-settings')" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                            <i class="fas fa-cogs w-5 sidebar-icon"></i>
                            <span class="sidebar-text">System Settings</span>
                        </button>
                    </div>
                </div>
            </nav>

            <div class="p-4 border-t border-gray-700">
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
                            <input type="text" placeholder="Search system data..."
                                class="w-full pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">5</span>
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
                            <span class="text-sm font-medium text-gray-700">Admin User</span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section active">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="card">
                                <div class="flex items-start justify-between mb-6">
                                    <div>
                                        <h1 class="text-3xl font-bold text-gray-900 flex items-center mb-1">
                                            <span class="mr-3 text-4xl leading-none">👋</span>Welcome, Admin!</h1>
                                        <!-- Updated: Added an ID to the paragraph for JS insertion -->
                                        <p id="dashboard-date" class="text-gray-600 mt-1 text-lg">Admin views a high-level overview of the system, including statistics (user activity, course progress, system health, etc.)</p>
                                    </div>
                                    <div class="text-right bg-blue-100 text-blue-800 px-4 py-2 rounded-lg shadow-sm">
                                        <div class="text-sm font-medium">Total Users</div>
                                        <div class="text-xl font-bold">1200</div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                    <div class="bg-purple-50 rounded-lg p-4 flex items-center space-x-3">
                                        <i class="fas fa-chalkboard-teacher text-2xl text-purple-600"></i>
                                        <div>
                                            <p class="text-sm text-gray-600">Teachers</p>
                                            <p class="text-xl font-bold text-gray-900">35</p>
                                        </div>
                                    </div>
                                    <div class="bg-green-50 rounded-lg p-4 flex items-center space-x-3">
                                        <i class="fas fa-user-graduate text-2xl text-green-600"></i>
                                        <div>
                                            <p class="text-sm text-gray-600">Students</p>
                                            <p class="text-xl font-bold text-gray-900">1100</p>
                                        </div>
                                    </div>
                                    <div class="bg-red-50 rounded-lg p-4 flex items-center space-x-3">
                                        <i class="fas fa-book text-2xl text-red-600"></i>
                                        <div>
                                            <p class="text-sm text-gray-600">Active Courses</p>
                                            <p class="text-xl font-bold text-gray-900">50</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 mb-6 shadow-md">
                                    <div class="flex flex-col md:flex-row items-center justify-between">
                                        <div class="mb-4 md:mb-0 md:mr-6 flex-1">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">System Health: All Systems Operational</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed">
                                                All platform services are running smoothly. Monitor performance metrics for detailed insights.
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="w-32 h-24 bg-white rounded-xl flex items-center justify-center shadow-inner">
                                                <i class="fas fa-check-circle text-4xl text-green-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="flex items-center justify-between mb-4">
                                    <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                                        <i class="fas fa-chart-bar mr-3 text-blue-600"></i>
                                        Recent Activity Log
                                    </h2>
                                    <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center group">
                                        View full log <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center space-x-3 text-sm text-gray-700">
                                        <i class="fas fa-user-plus text-green-500"></i>
                                        <span>New user 'Alice Johnson' registered. (Student)</span>
                                        <span class="ml-auto text-xs text-gray-500">5 mins ago</span>
                                    </li>
                                    <li class="flex items-center space-x-3 text-sm text-gray-700">
                                        <i class="fas fa-book-medical text-blue-500"></i>
                                        <span>Course 'Introduction to AI' created by John Doe.</span>
                                        <span class="ml-auto text-xs text-gray-500">15 mins ago</span>
                                    </li>
                                    <li class="flex items-center space-x-3 text-sm text-gray-700">
                                        <i class="fas fa-exclamation-triangle text-orange-500"></i>
                                        <span>High load detected on authentication service.</span>
                                        <span class="ml-auto text-xs text-gray-500">30 mins ago</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="card">
                                <h3 class="font-semibold text-gray-900 mb-4">Overall Platform Statistics</h3>
                                <div class="space-y-4">
                                    <div>
                                        <p class="text-sm text-gray-600 mb-1">Active Users (Daily Average)</p>
                                        <div class="flex items-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                                            </div>
                                            <span class="ml-2 text-sm font-medium text-gray-900">75%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 mb-1">Courses Completed (Overall)</p>
                                        <div class="flex items-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-green-600 h-2.5 rounded-full" style="width: 88%"></div>
                                            </div>
                                            <span class="ml-2 text-sm font-medium text-gray-900">88%</span>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 mb-1">Platform Storage Used</p>
                                        <div class="flex items-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-purple-600 h-2.5 rounded-full" style="width: 42%"></div>
                                            </div>
                                            <span class="ml-2 text-sm font-medium text-gray-900">42%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <h3 class="font-semibold text-gray-900 mb-4">Quick Actions</h3>
                                <div class="space-y-3">
                                    <button onclick="showSection('manage-users')" class="w-full bg-blue-100 text-blue-800 py-2 rounded-lg hover:bg-blue-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-user-plus"></i> <span>Add New User</span>
                                    </button>
                                    <button onclick="showSection('notifications')" class="w-full bg-green-100 text-green-800 py-2 rounded-lg hover:bg-green-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-bullhorn"></i> <span>Send System Announcement</span>
                                    </button>
                                    <button onclick="showSection('reports')" class="w-full bg-purple-100 text-purple-800 py-2 rounded-lg hover:bg-purple-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                                        <i class="fas fa-file-invoice"></i> <span>Generate Report</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manage Users Section -->
                <div id="manage-users-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Manage Users</h1>
                        <p class="text-gray-600">Admin can add, edit, and delete users (students and teachers). Admin can assign roles (Admin, Teacher, Student) to new or existing users. Admin can search for users and modify user details.</p>
                    </div>

                    <div class="card">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 space-y-4 md:space-y-0">
                            <h2 class="text-xl font-semibold text-gray-900">All System Users</h2>
                            <div class="flex space-x-2 w-full md:w-auto">
                                <input type="text" placeholder="Search users..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    <i class="fas fa-user-plus mr-2"></i> Add New User
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Admin User</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">admin@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-semibold">Admin</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Mr. Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">teacher.smith@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 font-semibold">Teacher</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">john.doe@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Student</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">jane.smith@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Student</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- More user rows can be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Course Management Section (Admin View) -->
                <div id="course-management-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Course Management</h1>
                        <p class="text-gray-600">Admin can view all courses on the platform, and add, edit, or delete courses. Admin can also assign teachers to courses and set course details (prerequisites, categories, etc.).</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-semibold text-gray-900">Web Development I</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Active</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Taught by: Mr. Smith</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 35 Students Enrolled</li>
                                <li><i class="fas fa-file-alt mr-2 text-gray-500"></i> 8 Assignments</li>
                                <li><i class="fas fa-question-circle mr-2 text-gray-500"></i> 4 Quizzes</li>
                                <li><i class="fas fa-info-circle mr-2 text-gray-500"></i> Category: Programming</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    Edit Course Details
                                </button>
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-900">Data Structures & Algorithms</h3>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">Active</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Taught by: Ms. Davis</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 28 Students Enrolled</li>
                                <li><i class="fas fa-clipboard-list mr-2 text-gray-500"></i> 6 Assignments</li>
                                <li><i class="fas fa-question-circle mr-2 text-gray-500"></i> 3 Quizzes</li>
                                <li><i class="fas fa-info-circle mr-2 text-gray-500"></i> Category: Computer Science</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                                    Edit Course Details
                                </button>
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-900">Introduction to AI</h3>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium">Pending Approval</span>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm">Proposed by: Dr. Johnson</p>
                            <ul class="text-sm text-gray-700 space-y-1 mb-4">
                                <li><i class="fas fa-users mr-2 text-gray-500"></i> 0 Students</li>
                                <li><i class="fas fa-clipboard-list mr-2 text-gray-500"></i> 0 Assignments Set</li>
                                <li><i class="fas fa-question-circle mr-2 text-gray-500"></i> 0 Quizzes Set</li>
                                <li><i class="fas fa-info-circle mr-2 text-gray-500"></i> Category: Artificial Intelligence</li>
                            </ul>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Approve Course
                                </button>
                                <button class="bg-red-600 text-white p-2 rounded-lg hover:bg-red-700 transition-colors">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <button class="lg:col-span-3 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-plus-circle"></i> <span>Add New Course</span>
                        </button>
                    </div>
                </div>

                <!-- Assignments Section (Admin View) -->
                <div id="assignments-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Assignments</h1>
                        <p class="text-gray-600">Admin can view all assignments across courses, monitor teacher’s grading status and results for each assignment, and generate reports based on assignments.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="card">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Web Development I - Design Project 1</h3>
                                    <p class="text-gray-600 text-sm">Teacher: Mr. Smith | Due: Feb 10, 2025</p>
                                </div>
                                <span class="text-xs bg-orange-100 text-orange-800 px-3 py-1 rounded-full font-medium flex-shrink-0">5 Pending Grades</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Overall grading progress: <span class="font-medium text-gray-900">85% graded</span></p>
                                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    View Grading Details
                                </button>
                                <button class="mt-3 ml-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors text-sm font-semibold">
                                    Generate Report
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Data Structures & Algorithms - Algorithm Analysis Homework</h3>
                                    <p class="text-gray-600 text-sm">Teacher: Ms. Davis | Due: Mar 5, 2025</p>
                                </div>
                                <span class="text-xs bg-red-100 text-red-800 px-3 py-1 rounded-full font-medium flex-shrink-0">8 Pending Grades</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Overall grading progress: <span class="font-medium text-gray-900">60% graded</span></p>
                                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    View Grading Details
                                </button>
                                <button class="mt-3 ml-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors text-sm font-semibold">
                                    Generate Report
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Database Systems - SQL Query Optimization</h3>
                                    <p class="text-gray-600 text-sm">Teacher: Dr. Patel | Published: Apr 1, 2025</p>
                                </div>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Draft</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Assignment not yet published to students.</p>
                                <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Approve Publishing
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quizzes Section (Admin View) -->
                <div id="quizzes-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Quizzes</h1>
                        <p class="text-gray-600">Admin can view all quizzes across courses, monitor teacher's work and results, and generate reports based on quizzes.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="card">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Web Development I - HTML/CSS Basics Quiz</h3>
                                    <p class="text-gray-600 text-sm">Teacher: Mr. Smith | Administered: Jan 20, 2025</p>
                                </div>
                                <span class="text-xs bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Graded</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Overall completion rate: <span class="font-medium text-gray-900">95%</span></p>
                                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                    View Aggregate Results
                                </button>
                                <button class="mt-3 ml-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors text-sm font-semibold">
                                    Generate Report
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Data Structures & Algorithms - Linked Lists Quiz</h3>
                                    <p class="text-gray-600 text-sm">Teacher: Ms. Davis | Closes: Feb 28, 2025</p>
                                </div>
                                <span class="text-xs bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Active</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Current participation: <span class="font-medium text-gray-900">70% students started</span></p>
                                <button class="mt-3 bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors text-sm font-semibold">
                                    Monitor Live Progress
                                </button>
                                <button class="mt-3 ml-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors text-sm font-semibold">
                                    Generate Report
                                </button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg font-semibold text-gray-900">Database Systems - Normalization Quiz</h3>
                                    <p class="text-gray-600 text-sm">Teacher: Dr. Patel | Scheduled: Apr 15, 2025</p>
                                </div>
                                <span class="text-xs bg-purple-100 text-purple-800 px-3 py-1 rounded-full font-medium flex-shrink-0">Ready to Publish</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Review required before publishing.</p>
                                <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                    Approve Quiz
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Tracking Section (Admin View) -->
                <div id="progress-tracking-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Progress Tracking</h1>
                        <p class="text-gray-600">Admin can access student progress reports for all courses.</p>
                    </div>

                    <div class="card mb-4">
                        <h2 class="text-xl font-semibold mb-3 text-gray-900">System-Wide Student Performance</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Overall Average Grade</p>
                                <p class="text-2xl font-bold text-blue-600">86.5%</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-500">Students Above Average</p>
                                <p class="text-2xl font-bold text-green-600">720</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">Generate specific reports for granular data.</p>
                    </div>

                    <div class="card">
                        <h2 class="text-xl font-semibold mb-3 text-gray-900">Students with Academic Alerts</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Grade</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alert Reason</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Emily White</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Data Structures & Algorithms</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">58% (F)</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Failing Grade
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">Contact Teacher</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">David Lee</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Web Development I</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">65% (D)</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Low Participation
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View History</a>
                                        </td>
                                    </tr>
                                    <!-- More rows for students with alerts can be added here -->
                                </tbody>
                            </table>
                        </div>
                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md mt-6">
                            <i class="fas fa-users-viewfinder"></i> <span>View All Student Progress</span>
                        </button>
                    </div>
                </div>

                <!-- Notifications Section (Admin View) -->
                <div id="notifications-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Notifications</h1>
                        <p class="text-gray-600">Admin can create and send global notifications (e.g., system maintenance, course launch) and manage notification settings for the platform.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="card flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4 border-l-4 border-blue-500">
                            <div class="flex-shrink-0">
                                <i class="fas fa-bullhorn text-blue-500 text-2xl"></i>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">New Course Available: Introduction to Quantum Computing!</h3>
                                <p class="text-gray-700 text-sm">A new course has been published. All students are encouraged to check it out!</p>
                                <span class="text-xs text-gray-500 mt-1 block">Sent: 2 hours ago | Audience: All Users</span>
                                <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">Edit Notification</button>
                            </div>
                        </div>

                        <div class="card flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4 border-l-4 border-orange-500">
                            <div class="flex-shrink-0">
                                <i class="fas fa-screwdriver-wrench text-orange-500 text-2xl"></i>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Scheduled Maintenance Alert</h3>
                                <p class="text-gray-700 text-sm">Platform will be down for maintenance on [Date] from [Time] to [Time].</p>
                                <span class="text-xs text-gray-500 mt-1 block">Scheduled: Next Monday | Audience: All Users</span>
                                <button class="mt-3 bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors text-sm font-semibold">Edit Notification</button>
                            </div>
                        </div>

                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-paper-plane"></i> <span>Send New System-Wide Announcement</span>
                        </button>
                    </div>
                </div>

                <!-- Reports Section (Admin View) -->
                <div id="reports-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Reports</h1>
                        <p class="text-gray-600">Admin can generate comprehensive system-wide reports on course effectiveness, user activity, and student performance.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="card flex flex-col items-center justify-center text-center">
                            <i class="fas fa-chart-line text-5xl text-blue-600 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Platform Usage Trends</h3>
                            <p class="text-gray-600 text-sm mb-4">Analyze user login patterns, active sessions, and peak usage times.</p>
                            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                Generate Report
                            </button>
                        </div>

                        <div class="card flex flex-col items-center justify-center text-center">
                            <i class="fas fa-book-reader text-5xl text-purple-600 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Course Effectiveness Analysis</h3>
                            <p class="text-gray-600 text-sm mb-4">Evaluate average grades, completion rates, and student feedback per course.</p>
                            <button class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors text-sm font-semibold">
                                Generate Report
                            </button>
                        </div>

                        <div class="card flex flex-col items-center justify-center text-center">
                            <i class="fas fa-user-graduate text-5xl text-green-600 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Student Performance Overview</h3>
                            <p class="text-gray-600 text-sm mb-4">Comprehensive report on all student academic performance across the platform.</p>
                            <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold">
                                Generate Report
                            </button>
                        </div>

                        <button class="lg:col-span-3 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md">
                            <i class="fas fa-plus-circle"></i> <span>Create Custom Report</span>
                        </button>
                    </div>
                </div>

                <!-- System Settings Section -->
                <div id="system-settings-section" class="section">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">System Settings</h1>
                        <p class="text-gray-600">Admin can configure platform-wide settings, including email templates, theme settings, and other system-wide preferences.</p>
                    </div>

                    <div class="card space-y-6">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">General Settings</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="platform-name" class="block text-sm font-medium text-gray-700">Platform Name</label>
                                    <input type="text" id="platform-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="EduPro Learning">
                                </div>
                                <div>
                                    <label for="default-theme" class="block text-sm font-medium text-gray-700">Default Theme</label>
                                    <select id="default-theme" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option>Light</option>
                                        <option selected>Dark</option>
                                        <option>System Default</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">Email Settings</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="smtp-host" class="block text-sm font-medium text-gray-700">SMTP Host</label>
                                    <input type="text" id="smtp-host" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="smtp.example.com">
                                </div>
                                <div>
                                    <label for="smtp-port" class="block text-sm font-medium text-gray-700">SMTP Port</label>
                                    <input type="number" id="smtp-port" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="587">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="email-from" class="block text-sm font-medium text-gray-700">Email From Address</label>
                                    <input type="email" id="email-from" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="noreply@edupro.com">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold">
                                Save Settings
                            </button>
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

        // Set current date on dashboard load
        document.addEventListener('DOMContentLoaded', () => {
            const dashboardButton = document.querySelector('#sidebar button[onclick="showSection(\'dashboard\')"]');
            if (dashboardButton) {
                dashboardButton.classList.add('sidebar-active');
            }

        const dashboardDateElement = document.getElementById('dashboard-date');
            if (dashboardDateElement) {
                const currentDate = new Date().toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                const originalText = "Here's your overview of courses, upcoming assignments, quizzes, and grades.<br>You'll also find notifications about course deadlines and announcements.";
                dashboardDateElement.innerHTML = `${originalText} Today is ${currentDate}.`;
            }
        });
    </script>
</body>
</html>
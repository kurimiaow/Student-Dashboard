<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-active {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#0C1E33] text-white flex flex-col">
            <!-- Inside the logo section -->
<div class="p-4 border-b border-[#242639]">
    <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain rounded">
        <span class="text-xl font-semibold">EduPortal</span>
    </div>
</div>


            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <!-- Dashboard -->
                <div class="mb-6">
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg sidebar-active">
                        <i class="fas fa-th-large w-5"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <!-- Academic Section -->
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold">ACADEMIC</h3>
                    <div class="space-y-2">
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors">
                            <i class="fas fa-book-open w-5"></i>
                            <span>Enrolled Courses</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors">
                            <i class="fas fa-clipboard-list w-5"></i>
                            <span>Assignments</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors">
                            <i class="fas fa-question-circle w-5"></i>
                            <span>Quizzes</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors">
                            <i class="fas fa-file-alt w-5"></i>
                            <span>Course Materials</span>
                        </a>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors">
                            <i class="fas fa-chart-line w-5"></i>
                            <span>Progress Tracker</span>
                        </a>
                    </div>
                </div>

                <!-- Settings Section -->
                <div class="mb-6">
                    <h3 class="text-xs uppercase text-gray-400 mb-3 font-semibold">SETTINGS</h3>
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bell w-5"></i>
                        <span>Notification Preferences</span>
                    </a>
                </div>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors w-full text-left">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <!-- Search Bar -->
                    <div class="flex-1 max-w-2xl">
                        <div class="relative">
                            <input type="text" placeholder="Search" 
                                class="w-full pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Header Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Messages -->
                        <div class="relative">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-blue-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                            </button>
                        </div>

                        <!-- Notifications -->
                        <div class="relative">
                            <button class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-bell text-xl"></i>
                            </button>
                        </div>

                        <!-- Profile -->
                        <div class="flex items-center space-x-2">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face&facepad=2&rounded=full" 
                                alt="Profile" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Catherine' }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Content -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Welcome Section -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 flex items-center">
                                        <span class="mr-2">👋</span> Welcome, {{ Auth::user()->name ?? 'Catherine' }}!
                                    </h1>
                                    <p class="text-gray-600 mt-1">{{ date('d F Y, l') }}</p>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-500">Semester</div>
                                    <div class="text-lg font-semibold">2 of 4</div>
                                </div>
                            </div>

                            <!-- Course Overview Illustration -->
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 mb-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Lorem Ipsum – Dolor Sit Club Amet!</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor<br>
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud<br>
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 ml-6">
                                        <div class="w-32 h-24 bg-gradient-to-br from-orange-200 to-red-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-users text-2xl text-orange-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enrolled Courses -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-book-open mr-2 text-blue-600"></i>
                                    Enrolled Courses
                                </h2>
                                <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center">
                                    View all <i class="fas fa-chevron-right ml-1"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Course Card 1 -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold text-gray-900">Web Development</h3>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-3">Learn modern web development techniques</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Progress: 75%</span>
                                        <div class="w-16 bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: 75%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Course Card 2 -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold text-gray-900">Data Structures</h3>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-3">Master algorithms and data structures</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Progress: 60%</span>
                                        <div class="w-16 bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Course Card 3 -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold text-gray-900">Database Systems</h3>
                                        <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Pending</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-3">Comprehensive database management</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Progress: 30%</span>
                                        <div class="w-16 bg-gray-200 rounded-full h-2">
                                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Course Card 4 -->
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                    <div class="flex items-center justify-between mb-3">
                                        <h3 class="font-semibold text-gray-900">Mobile Development</h3>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Active</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-3">Build mobile applications</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Progress: 45%</span>
                                        <div class="w-16 bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="space-y-6">
                        <!-- Calendar -->
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

                            <!-- Calendar Grid -->
                            <div class="grid grid-cols-7 gap-1 text-center text-sm">
                                <!-- Days of week -->
                                <div class="py-2 text-gray-500 font-medium">Mo</div>
                                <div class="py-2 text-gray-500 font-medium">Tu</div>
                                <div class="py-2 text-gray-500 font-medium">We</div>
                                <div class="py-2 text-gray-500 font-medium">Th</div>
                                <div class="py-2 text-gray-500 font-medium">Fr</div>
                                <div class="py-2 text-gray-500 font-medium">Sa</div>
                                <div class="py-2 text-gray-500 font-medium">Su</div>

                                <!-- Calendar dates -->
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

                        <!-- Homeworks/Assignments -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-900 flex items-center">
                                    <i class="fas fa-clipboard-list mr-2 text-purple-600"></i>
                                    Homeworks
                                </h3>
                                <a href="#" class="text-purple-600 hover:text-purple-700 text-sm font-medium flex items-center">
                                    View all <i class="fas fa-chevron-right ml-1"></i>
                                </a>
                            </div>

                            <div class="space-y-4">
                                <!-- Assignment 1 -->
                                <div class="border-l-4 border-orange-400 bg-orange-50 p-4 rounded-r-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-medium text-gray-900">Web Development</h4>
                                        <span class="text-xs bg-orange-100 text-orange-800 px-2 py-1 rounded-full">Not Submitted</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Assignment: Design Project 1</p>
                                    <p class="text-xs text-gray-500">Due Date: February 10, 2024</p>
                                </div>

                                <!-- Assignment 2 -->
                                <div class="border-l-4 border-green-400 bg-green-50 p-4 rounded-r-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-medium text-gray-900">Art Appreciation</h4>
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Not Submitted</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Assignment: Design Project 1</p>
                                    <p class="text-xs text-gray-500">Due Date: February 10, 2024</p>
                                </div>

                                <!-- Assignment 3 -->
                                <div class="border-l-4 border-purple-400 bg-purple-50 p-4 rounded-r-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-medium text-gray-900">Thesis Writing 1</h4>
                                        <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded-full">Not Submitted</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Assignment: Design Project 1</p>
                                    <p class="text-xs text-gray-500">Due Date: February 10, 2024</p>
                                </div>

                                <!-- Assignment 4 -->
                                <div class="border-l-4 border-blue-400 bg-blue-50 p-4 rounded-r-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-medium text-gray-900">Introduction to AI</h4>
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Not Submitted</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Assignment: Design Project 1</p>
                                    <p class="text-xs text-gray-500">Due Date: February 10, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
{{-- This content belongs in resources/views/student/sections/dashboard.blade.php --}}
<div id="dashboard-section" class="section">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            {{-- Welcome + Overview Card --}}
            <div class="card">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 flex items-center mb-1">
                            <span class="mr-3 text-4xl leading-none">👋</span> Welcome, Student!
                        </h1>
                        <p id="dashboard-date" class="text-gray-600 mt-1 text-lg">
                            <!-- Date will be dynamically populated by JavaScript -->
                        </p>
                    </div>
                    <!-- This is the button for 'Enrolled Courses' -->
                    <button type="button" onclick="loadSection('course-enrollment')"
                            class="text-right bg-blue-100 text-blue-800 px-4 py-2 rounded-lg shadow-sm w-20 h-20 flex flex-col justify-center items-center hover:bg-blue-200 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <div class="text-sm font-medium">Enrolled Courses</div>
                        <div id="enrolled-courses-count" class="text-xl font-bold">4</div>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Upcoming Assignments Button -->
                    <button type="button" onclick="loadSection('assignments')"
                        class="bg-purple-50 rounded-lg p-4 flex items-center space-x-3 hover:bg-purple-100 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            <i class="fas fa-clipboard-list text-2xl text-purple-600"></i>
                    <div>
                        <p class="text-sm text-gray-600">Upcoming Assignments</p>
                        <p id="upcoming-assignments-count" class="text-xl font-bold">3</p>
                    </div>
                </button>

                    <!-- Average Grade Button (redirects to Progress Tracking) -->
                    <button type="button" onclick="loadSection('progress-tracking')"
                        class="bg-green-50 rounded-lg p-4 flex items-center space-x-3 hover:bg-green-100 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            <i class="fas fa-receipt text-2xl text-green-600"></i>
                    <div>
                        <p class="text-sm text-gray-600">Average Grade</p>
                        <p id="average-grade" class="text-xl font-bold">B+</p>
                    </div>
                </button>

                    <!-- Pending Quizzes Button -->
                    <button type="button" onclick="loadSection('quizzes')"
                        class="bg-red-50 rounded-lg p-4 flex items-center space-x-3 hover:bg-red-100 transition-colors cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <i class="fas fa-stopwatch text-2xl text-red-600"></i>
                    <div>
                        <p class="text-sm text-gray-600">Pending Quizzes</p>
                        <p id="pending-quizzes-count" class="text-xl font-bold">1</p>
                        </div>
                    </button>
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

            {{-- Recent Announcements --}}
            <div class="card">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-bell mr-3 text-blue-600"></i>
                        Recent Announcements
                    </h2>
                    <a href="#" onclick="loadSection('notifications'); return false;" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center group">
                        View all <i class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                <ul id="announcements-list" class="space-y-3">
                    <!-- Announcements will be dynamically populated here by JavaScript. -->
                    <!-- These are example static entries that would be overwritten by populateDashboard: -->
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
                        <span>System maintenance this weekend (no access Sat 10–12 AM).</span>
                        <span class="ml-auto text-xs text-gray-500">Yesterday</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Right Column: Deadlines + Quick Links --}}
        <div class="space-y-6">
            <div class="card">
                <h3 class="font-semibold text-gray-900 mb-4">Upcoming Deadlines</h3>
                <div id="deadlines-list" class="space-y-3">
                    <div class="border-l-4 border-red-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Web Development - Assignment 3</p>
                        <p class="text-xs text-gray-600">Due: June 1, 2025</p>
                    </div>
                    <div class="border-l-4 border-yellow-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Introduction to AI - Quiz 1</p>
                        <p class="text-xs text-gray-600">Due: June 5, 2025</p>
                    </div>
                    <div class="border-l-4 border-red-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Web Dev I - Project Proposal</p>
                        <p class="text-xs text-gray-600">Due: June 8, 2025</p>
                    </div>
                    <div class="border-l-4 border-green-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Information Security - Project Proposal</p>
                        <p class="text-xs text-gray-600">Due: June 15, 2025</p>
                    </div>
                    <div class="border-l-4 border-blue-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Elective 1 - Exercise 2</p>
                        <p class="text-xs text-gray-600">Due: June 17, 2025</p>
                                        </div>
                    <div class="border-l-4 border-pink-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Software Engineer 1- Tool Prototype</p>
                        <p class="text-xs text-gray-600">Due: July 4, 2025</p>
                    </div>
                    <div class="border-l-4 border-blue-500 pl-3 py-1">
                        <p class="text-sm font-medium text-gray-900">Elective 1 - CISCO Certification</p>
                        <p class="text-xs text-gray-600">Due: July 5, 2025</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3 class="font-semibold text-gray-900 mb-4">Quick Links</h3>
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="loadSection('course-materials')" class="bg-blue-100 text-blue-800 py-2 rounded-lg hover:bg-blue-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                        <i class="fas fa-folder-open"></i> <span>Materials</span>
                    </button>
                    <button onclick="loadSection('assignments')" class="bg-green-100 text-green-800 py-2 rounded-lg hover:bg-green-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                        <i class="fas fa-tasks"></i> <span>Assignments</span>
                    </button>
                    <button onclick="loadSection('quizzes')" class="bg-purple-100 text-purple-800 py-2 rounded-lg hover:bg-purple-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                        <i class="fas fa-clipboard-question"></i> <span>Quizzes</span>
                    </button>
                    <button onclick="loadSection('progress-tracking')" class="bg-orange-100 text-orange-800 py-2 rounded-lg hover:bg-orange-200 transition-colors flex items-center justify-center space-x-2 text-sm font-medium">
                        <i class="fas fa-chart-line"></i> <span>Progress Tracking</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
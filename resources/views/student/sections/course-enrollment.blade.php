<div id="course-enrollment-section" class="section hidden space-y-10">
    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Course Enrollment</h1>
        <p class="text-gray-600 text-sm">Browse and enroll in new courses, or access materials for those you're already taking.</p>
    </div>

    {{-- Enrolled Courses --}}
    <div class="card">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">My Enrolled Courses</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Course Card -->
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 flex flex-col justify-between shadow-sm">
                <div>
                    <p class="font-semibold text-gray-900">Web Development</p>
                    <p class="text-sm text-gray-600">Mr. Smith</p>
                </div>
                <button onclick="loadSection('course-view-page', 'web-development-i')" class="mt-4 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold w-full">
                    Access Course
                </button>
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 flex flex-col justify-between shadow-sm">
                <div>
                    <p class="font-semibold text-gray-900">Data Structures & Algorithms</p>
                    <p class="text-sm text-gray-600">Ms. Davis</p>
                </div>
                <button onclick="loadSection('course-view-page', 'data-structures-algorithms')" class="mt-4 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold w-full">
                    Access Course
                </button>
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 flex flex-col justify-between shadow-sm">
                <div>
                    <p class="font-semibold text-gray-900">Introduction to AI</p>
                    <p class="text-sm text-gray-600">Dr. Johnson</p>
                </div>
                <button onclick="loadSection('course-view-page', 'introduction-to-ai')" class="mt-4 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-semibold w-full">
                    Access Course
                </button>
            </div>
        </div>
    </div>

    {{-- Available Courses --}}
    <div class="card">
        <h2 class="text-xl font-semibold text-gray-900 mb-6">Available Courses</h2>

        <div class="relative mb-6">
            <input type="text" placeholder="🔍 Search available courses..."
                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col justify-between shadow-sm">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Advanced Database Systems</h3>
                    <p class="text-sm text-gray-600">Teacher: Dr. Patel</p>
                    <p class="text-xs text-gray-500 mt-2">Learn advanced concepts in database design and management.</p>
                </div>
                <button onclick="loadSection('course-enrollment-form', 'advanced-database-systems')" class="mt-4 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold w-full">
                    Enroll Now
                </button>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col justify-between shadow-sm">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Cybersecurity Fundamentals</h3>
                    <p class="text-sm text-gray-600">Teacher: Ms. Rodriguez</p>
                    <p class="text-xs text-gray-500 mt-2">Introduction to cybersecurity principles and practices.</p>
                </div>
                <button onclick="loadSection('course-enrollment-form', 'cybersecurity-fundamentals')" class="mt-4 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold w-full">
                    Enroll Now
                </button>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4 flex flex-col justify-between shadow-sm">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Mobile App Development</h3>
                    <p class="text-sm text-gray-600">Teacher: Mr. Lee</p>
                    <p class="text-xs text-gray-500 mt-2">Develop cross-platform mobile applications.</p>
                </div>
                <button onclick="loadSection('course-enrollment-form', 'mobile-app-development')" class="mt-4 bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition-colors text-sm font-semibold w-full">
                    Enroll Now
                </button>
            </div>
        </div>
    </div>
</div>
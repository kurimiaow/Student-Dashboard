<div id="progress-tracking-section" class="section">
    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Progress Tracking</h1>
        <p class="text-gray-600">Track your progress in each course, see completed lessons, assignments, and overall grades.</p>
    </div>

    <div class="space-y-6">
        {{-- Course Progress Bars --}}
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

        {{-- Detailed Grade Table --}}
        <div class="card">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Detailed Grades</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Web Development I</td>
                            <td class="px-6 py-4 text-sm text-gray-600">HTML Basics Quiz</td>
                            <td class="px-6 py-4 text-sm text-gray-900">85/100</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">Graded</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Intro to AI</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Essay on Ethical AI</td>
                            <td class="px-6 py-4 text-sm text-gray-900">92/100</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">Graded</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">Data Structures & Algorithms</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Assignment 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">--</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-orange-100 text-orange-800">Pending</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Gradebook Button --}}
            <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center space-x-3 text-lg font-semibold shadow-md mt-6">
                <i class="fas fa-list-ol"></i> <span>View Full Gradebook</span>
            </button>
        </div>
    </div>
</div>
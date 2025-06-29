<div id="notifications-section" class="section">
    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Notifications</h1>
        <p class="text-gray-600">Stay up-to-date with important announcements and deadlines.</p>
    </div>

    <div class="space-y-4">
        {{-- Notification 1 --}}
        <div class="card flex items-start space-x-4 border-l-4 border-red-500">
            <i class="fas fa-calendar-times text-red-500 text-2xl mt-1"></i>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">
                    Assignment Due Soon: Data Structures Assignment 2
                </h3>
                <p class="text-gray-700 text-sm">
                    This assignment is due tomorrow, July 1, 2025. Don't forget to submit!
                </p>
                <span class="text-xs text-gray-500 mt-1 block">
                    Received: 10 hours ago | Course: Data Structures & Algorithms
                </span>
            </div>
        </div>

        {{-- Notification 2 --}}
        <div class="card flex items-start space-x-4 border-l-4 border-blue-500">
            <i class="fas fa-bullhorn text-blue-500 text-2xl mt-1"></i>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">
                    New Lecture Notes Available for Web Dev I
                </h3>
                <p class="text-gray-700 text-sm">
                    Lecture notes on "Advanced CSS Layouts" have been uploaded. Find them in Course Materials.
                </p>
                <span class="text-xs text-gray-500 mt-1 block">
                    Received: 5 hours ago | Course: Web Development I
                </span>
            </div>
        </div>

        {{-- Notification 3 --}}
        <div class="card flex items-start space-x-4 border-l-4 border-yellow-500">
            <i class="fas fa-triangle-exclamation text-yellow-500 text-2xl mt-1"></i>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">
                    Platform Maintenance Scheduled
                </h3>
                <p class="text-gray-700 text-sm">
                    The platform will undergo maintenance on Saturday, July 5th from 10:00 AM to 12:00 PM PST. Access may be interrupted.
                </p>
                <span class="text-xs text-gray-500 mt-1 block">
                    Received: Yesterday | System-wide
                </span>
            </div>
        </div>
    </div>
</div>
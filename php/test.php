<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="shortcut icon" href="../Logo/logo.png"/>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .menu-toggle {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        .margin-left-small {
            margin-left: 0.5rem;
        }

        .margin-left-auto {
            margin-left: auto;
        }

        .dropdown-icon {
            transition: transform 0.3s;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            display: none;
            margin-top: 0.5rem;
            padding-left: 1.75rem;
        }

        .menu-item-container > * + * {
            margin-top: 0.5rem;
        }

        .menu-item {
            display: block;
            padding: 0.5rem;
            font-size: 0.875rem;
            color: #4a5568; /* text-gray-700 */
            transition: color 0.2s;
            border-radius: 0.375rem;
        }

        .menu-item:hover {
            color: #1a202c; /* text-gray-900 */
        }

        .menu-item.active {
            color: #2d3748; /* text-gray-700 */
        }

        .menu-item.inactive {
            color: #cbd5e0; /* text-gray-400 */
        }

        .menu-item.inactive:hover {
            color: #f7fafc; /* hover:text-light */
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div>
        <a href="#" class="menu-toggle">
            <span class="margin-left-small text-sm">Dashboards</span>
            <span class="margin-left-auto" aria-hidden="true">
                <svg class="dropdown-icon w-4 h-4 transition-transform transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" class="dropdown-menu mt-2 menu-item-container px-7" aria-label="Dashboards">
            <a href="index.html" role="menuitem" class="menu-item active">Default</a>
            <a href="#" role="menuitem" class="menu-item inactive">Project Management (soon)</a>
            <a href="#" role="menuitem" class="menu-item inactive">E-Commerce (soon)</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.querySelector('.menu-toggle');
            const menu = document.querySelector('.dropdown-menu');
            const icon = document.querySelector('.dropdown-icon');

            toggle.addEventListener('click', function() {
                menu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
     <script type="text/javascript" src="../js/particles.js"></script>
     <script type="text/javascript" src="../js/app.js"></script>
</body>
</html>

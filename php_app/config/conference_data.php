<?php
/**
 * Conference Static Data Model
 * Extracted directly from src/App.tsx to maintain 100% data fidelity
 */

return [
    'stats' => [
        ['icon' => 'users',    'value' => '500+', 'label' => 'Participants'],
        ['icon' => 'globe',    'value' => '50+',  'label' => 'Countries'],
        ['icon' => 'mic',      'value' => '120+', 'label' => 'Speakers'],
        ['icon' => 'building', 'value' => '200+', 'label' => 'Institutions'],
        ['icon' => 'file-text','value' => '150+', 'label' => 'Research Papers'],
        ['icon' => 'award',    'value' => '10+',  'label' => 'Keynote Sessions'],
    ],
    'highlights' => [
        'High-quality paper presentations',
        'Keynote talks from global experts',
        'Workshops & technical sessions',
        'Peer-reviewed conference proceedings',
    ],

    'tracks' => [
        [
            'trackNum' => 'Track 1',
            'title' => 'Sustainable Energy Systems and Decarbonization Technologies',
            'icon' => '⚡',
            'topics' => [
                'Renewable Energy Systems',
                'Energy Storage Technologies',
                'Smart Grids and Microgrids',
                'Hydrogen Energy Systems',
                'Carbon Capture and Emission Reduction',
                'Net-Zero Energy Solutions',
            ],
        ],
        [
            'trackNum' => 'Track 2',
            'title' => 'Smart and Sustainable Built Environments',
            'icon' => '🏙️',
            'topics' => [
                'Intelligent Buildings',
                'Green and Net-Zero Buildings',
                'Smart Cities and Smart Districts',
                'Digital Twins for Infrastructure',
                'Sustainable Urban Development',
                'Building Energy Management Systems',
            ],
        ],
        [
            'trackNum' => 'Track 3',
            'title' => 'Sustainable Manufacturing and Circular Economy',
            'icon' => '♻️',
            'topics' => [
                'Sustainable Manufacturing Technologies',
                'Industry 5.0 Applications',
                'Resource-Efficient Production',
                'Circular Economy Models',
                'Recycling and Waste Valorization',
                'Sustainable Supply Chains',
            ],
        ],
        [
            'trackNum' => 'Track 4',
            'title' => 'Artificial Intelligence and Digital Technologies for Sustainability',
            'icon' => '🤖',
            'topics' => [
                'AI and Machine Learning Applications',
                'Big Data Analytics',
                'Internet of Things (IoT)',
                'Image Processing and Cloud Computing',
                'Digital Transformation for Sustainability',
                'Cyber-Physical Systems',
            ],
        ],
        [
            'trackNum' => 'Track 5',
            'title' => 'Climate Change, Environmental Management and Resource Sustainability',
            'icon' => '🌿',
            'topics' => [
                'Climate Change Mitigation and Adaptation',
                'Environmental Impact Assessment',
                'Air and Water Quality Management',
                'Natural Resource Conservation',
                'Sustainable Agriculture Systems',
                'Environmental Monitoring Technologies',
            ],
        ],
        [
            'trackNum' => 'Track 6',
            'title' => 'Sustainable Transportation and Resilient Infrastructure Systems',
            'icon' => '🚆',
            'topics' => [
                'Smart Transportation Systems',
                'Electric and Autonomous Vehicles',
                'Intelligent Road Infrastructure',
                'Structural Health Monitoring',
                'Infrastructure Resilience',
                'Disaster-Resistant Engineering Systems',
            ],
        ],
    ],

    'dates' => [
        ['label' => 'Paper Submission Deadline', 'date' => '30 Sept, 2026', 'type' => 'deadline'],
        ['label' => 'Notification of Acceptance', 'date' => '31 Oct, 2026',  'type' => 'info'],
        ['label' => 'Camera Ready Submission',   'date' => '20 Nov, 2026',  'type' => 'info'],
        ['label' => 'Early Bird Registration',   'date' => '15 Nov, 2026',  'type' => 'special'],
        ['label' => 'Conference Dates',          'date' => '15–16 Feb, 2027','type' => 'event'],
    ],

    'speakers' => [
        [
            'name' => 'Dr. Kai-Fu Lee',
            'role' => 'Chairman & CEO',
            'org' => 'Innovation Ventures, USA',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=faces&auto=format'
        ],
        [
            'name' => 'Dr. Fei-Fei Li',
            'role' => 'Professor of AI',
            'org' => 'Stanford University, USA',
            'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=300&fit=crop&crop=faces&auto=format'
        ],
        [
            'name' => 'Dr. R. A. Mashelkar',
            'role' => 'Former Director General',
            'org' => 'CSIR, India',
            'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&h=300&fit=crop&crop=faces&auto=format'
        ],
        [
            'name' => 'Dr. Yann LeCun',
            'role' => 'VP & Chief AI Scientist',
            'org' => 'Meta, USA',
            'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop&crop=faces&auto=format'
        ],
    ],

    'reg_fees' => [
        ['category' => 'Students',           'early' => '₹1,500', 'regular' => '₹2,000', 'spot' => '₹2,500'],
        ['category' => 'Research Scholars',  'early' => '₹2,000', 'regular' => '₹2,580', 'spot' => '₹3,000'],
        ['category' => 'Academicians',       'early' => '₹2,500', 'regular' => '₹3,000', 'spot' => '₹3,500'],
        ['category' => 'Industry / Others',  'early' => '₹3,000', 'regular' => '₹3,580', 'spot' => '₹4,000'],
    ],

    'sponsors' => [
        ['name' => 'IEEE'],
        ['name' => 'Springer'],
        ['name' => 'Scopus'],
        ['name' => 'Google'],
        ['name' => 'Microsoft'],
        ['name' => 'AWS'],
        ['name' => 'Taylor & Francis'],
    ],

    'scopes' => [
        'Sustainable Energy Systems and Decarbonization Technologies',
        'Smart and Sustainable Built Environments',
        'Sustainable Manufacturing and Circular Economy',
        'Artificial Intelligence and Digital Technologies for Sustainability',
        'Climate Change Mitigation and Environmental Sustainability',
        'Sustainable Transportation and Resilient Infrastructure Systems',
        'Smart Cities, Digital Twins and Intelligent Infrastructure',
        'Industry 5.0, IoT, Big Data Analytics and Cyber-Physical Systems',
        'Renewable Energy Integration and Net-Zero Solutions',
        'Resource Efficiency, Waste Management and Circular Production Systems',
    ],

    'objectives' => [
        'Provide an international platform for researchers, academicians, industry leaders, and policymakers to share recent advancements in sustainability science, engineering, and intelligent technologies.',
        'Promote research and innovation supporting global sustainability goals, climate resilience, decarbonization, and resource-efficient development.',
        'Facilitate collaboration among academia, industry, government organizations, and research institutions for addressing sustainability challenges through technology-driven solutions.',
        'Encourage the application of Artificial Intelligence, Knowledge Systems, Digital Technologies, and Industry 5.0 principles for sustainable engineering and infrastructure development.',
        'Showcase emerging technologies, best practices, and successful case studies in renewable energy, smart manufacturing, intelligent infrastructure, and environmental management.',
        'Strengthen global research networks and foster international partnerships for sustainable technological advancement and societal progress.',
    ],

    'committee' => require __DIR__ . '/committee_members.php',

    'nav_links' => [
        ['label' => 'Home',            'target' => 'top',             'page' => 'home'],
        ['label' => 'About',           'target' => 'about',           'page' => 'home'],
        ['label' => 'Tracks',          'target' => 'tracks',          'page' => 'home'],
        ['label' => 'Call for Papers', 'target' => 'cfp',             'page' => 'home'],
        ['label' => 'Speakers',        'target' => 'speakers',        'page' => 'home'],
        ['label' => 'Committee',       'target' => 'committee',       'page' => 'home'],
        ['label' => 'Schedule',        'target' => 'dates',           'page' => 'home'],
        ['label' => 'Registration',    'target' => 'fees',            'page' => 'home'],
        ['label' => 'Venue',           'target' => 'venue',           'page' => 'home'],
        ['label' => 'Contact',         'target' => 'contact-section', 'page' => 'home'],
    ]
];

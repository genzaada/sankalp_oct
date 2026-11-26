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
            'title' => 'Sustainable Automotive Mobility, Electric Vehicles and Intelligent Transportation Systems',
            'icon' => '🚗',
            'topics' => [
                'Electric Vehicles & Hybrid Powertrains',
                'Intelligent Transportation Systems (ITS)',
                'Autonomous & Connected Vehicles',
                'Battery Management Systems & Charging Infrastructure',
                'Vehicle Dynamics & Aerodynamics for Efficiency',
                'Sustainable Automotive Materials & Recycling',
            ],
        ],
        [
            'trackNum' => 'Track 2',
            'title' => 'Intelligent Sustainable Manufacturing and Industry 5.0',
            'icon' => '🏭',
            'topics' => [
                'Industry 5.0 & Human-Centric Manufacturing',
                'Intelligent Automation & Smart Robotics',
                'Additive Manufacturing & Precision Engineering',
                'Green Manufacturing & Resource Efficiency',
                'Digital Twins in Manufacturing Operations',
                'Resilient & Sustainable Supply Chains',
            ],
        ],
        [
            'trackNum' => 'Track 3',
            'title' => 'Smart and Sustainable Materials, Infrastructure and Advanced Engineering Systems',
            'icon' => '🏗️',
            'topics' => [
                'Advanced Smart & Bio-Based Materials',
                'Resilient & Sustainable Infrastructure',
                'Intelligent & Net-Zero Built Environments',
                'Structural Health Monitoring & Non-Destructive Testing',
                'Smart Cities & Urban Systems Modeling',
                'Disaster-Resilient Engineering Systems',
            ],
        ],
        [
            'trackNum' => 'Track 4',
            'title' => 'Sustainable Energy Systems, Thermal Engineering and Renewable Energy Integration',
            'icon' => '⚡',
            'topics' => [
                'Renewable Energy Integration (Solar, Wind, Bioenergy)',
                'Advanced Thermal Engineering, HVAC & Heat Recovery',
                'Energy Storage Technologies & Microgrids',
                'Hydrogen Energy & Alternative Clean Fuels',
                'Decarbonization & Industrial Energy Efficiency',
                'Net-Zero Energy Systems & Policy',
            ],
        ],
        [
            'trackNum' => 'Track 5',
            'title' => 'Artificial Intelligence and Digital Technologies for Intelligent Engineering',
            'icon' => '🤖',
            'topics' => [
                'Artificial Intelligence & Machine Learning in Engineering',
                'Internet of Things (IoT) & Edge Computing',
                'Cyber-Physical Systems & Neural Networks',
                'Big Data Analytics for Industrial Optimization',
                'Computer Vision & Automated Quality Inspection',
                'Digital Technologies for Sustainable Industrial Growth',
            ],
        ],
        [
            'trackNum' => 'Track 6',
            'title' => 'Environmental Sustainability, Climate Resilience and Circular Economy',
            'icon' => '🌿',
            'topics' => [
                'Climate Change Mitigation & Adaptation Strategies',
                'Circular Economy Models & Life Cycle Assessment',
                'Industrial Waste Valorization & Recycling Technologies',
                'Air, Water & Soil Quality Engineering',
                'Carbon Capture, Utilization & Storage (CCUS)',
                'Ecological Conservation & Environmental Governance',
            ],
        ],
    ],

    // Important Conference Dates (Conditional Proposed State: Clearly marked as proposed pending formal confirmation)
    'dates' => [
        ['label' => 'Paper Submission Deadline', 'date' => 'December 25, 2026', 'type' => 'deadline', 'status' => 'Proposed'],
        ['label' => 'Notification of Acceptance', 'date' => 'January 10, 2027',  'type' => 'info',     'status' => 'Proposed'],
        ['label' => 'Camera-Ready Paper Submission', 'date' => 'January 20, 2027', 'type' => 'info', 'status' => 'Proposed'],
        ['label' => 'Conference Registration Deadline', 'date' => 'February 20, 2027', 'type' => 'special', 'status' => 'Proposed'],
        ['label' => 'Conference Dates',          'date' => 'April 9–10, 2027',   'type' => 'event',    'status' => 'Proposed'],
    ],

    'speakers' => [
        [
            'name' => 'Dr. Kai-Fu Lee',
            'role' => 'Chairman & CEO',
            'org' => 'Innovation Ventures, USA',
            'image' => null, // Placeholder stock models removed; authentic portraits pending speaker confirmation
        ],
        [
            'name' => 'Dr. Fei-Fei Li',
            'role' => 'Professor of AI',
            'org' => 'Stanford University, USA',
            'image' => null,
        ],
        [
            'name' => 'Dr. R. A. Mashelkar',
            'role' => 'Former Director General',
            'org' => 'CSIR, India',
            'image' => null,
        ],
        [
            'name' => 'Dr. Yann LeCun',
            'role' => 'VP & Chief AI Scientist',
            'org' => 'Meta, USA',
            'image' => null,
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

    // Proposed Industry Sponsorship Categories (Configurable - Not published until approved)
    'sponsorship_categories' => [
        [
            'category' => 'Title Sponsor',
            'contribution' => '₹3,00,000',
            'expected_slots' => 1,
            'status' => 'Proposed'
        ],
        [
            'category' => 'Platinum Sponsor',
            'contribution' => '₹2,00,000',
            'expected_slots' => 1,
            'status' => 'Proposed'
        ],
        [
            'category' => 'Gold Sponsor',
            'contribution' => '₹1,00,000',
            'expected_slots' => 3,
            'status' => 'Proposed'
        ],
        [
            'category' => 'Silver Sponsor',
            'contribution' => '₹50,000',
            'expected_slots' => 4,
            'status' => 'Proposed'
        ],
    ],

    'scopes' => [
        'Sustainable Automotive Mobility, Electric Vehicles & Powertrain Innovations',
        'Intelligent Sustainable Manufacturing, Smart Robotics & Industry 5.0',
        'Smart and Sustainable Materials, Infrastructure & Advanced Engineering',
        'Sustainable Energy Systems, Thermal Engineering & Renewable Energy Integration',
        'Artificial Intelligence, Digital Technologies & Cyber-Physical Systems',
        'Environmental Sustainability, Climate Resilience & Circular Economy Models',
        'Autonomous Vehicles, Connected Mobility & Intelligent Transportation Systems',
        'Energy Storage Technologies, Hydrogen Fuel & Net-Zero Solutions',
        'Digital Twins, IoT & Big Data Analytics for Industrial Optimization',
        'Interdisciplinary Industry-Academia Collaborative Innovation',
    ],

    'objectives' => [
        'Provide a premier international forum bringing together academia, automotive professionals, industry leaders, and researchers to share breakthroughs in intelligent engineering and sustainable technologies.',
        'Promote sustainable automotive mobility, electric vehicles, and intelligent transportation solutions supporting climate resilience and decarbonization goals.',
        'Foster active linkages and collaborative partnerships between academic institutions and global industries through joint research, innovation, and technological exchange.',
        'Advance the integration of Industry 5.0, Human-Centric Manufacturing, Artificial Intelligence, and Digital Technologies across diverse engineering domains.',
        'Showcase emerging developments in renewable energy, advanced thermal engineering, energy storage, and resource-efficient circular production systems.',
        'Facilitate meaningful technical dialogue on environmental sustainability, carbon footprint reduction, and future-ready engineering education.',
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

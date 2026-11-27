<?php
/**
 * Conference Static Data Model
 * Extracted directly from src/App.tsx to maintain 100% data fidelity
 */

return [
    'stats' => [],
    'highlights' => [
        'Interdisciplinary Research Presentation',
        'Six Thematic Engineering Tracks',
        'Peer-Reviewed Technical Submissions',
        'Academic & Industry Knowledge Exchange',
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

    // Keynote & Invited Sessions (Provisional State: Forthcoming Announcements)
    // Note: Official speaker profiles will be published following formal confirmation by the steering committee.
    'speakers_confirmed' => false,
    'speakers' => [
        [
            'name' => 'To Be Announced',
            'role' => 'Keynote Address',
            'theme' => 'Sustainable Automotive Mobility & Electric Vehicles',
            'track' => 'Track 1',
            'status' => 'To Be Announced',
            'confirmed' => false,
            'image' => null,
        ],
        [
            'name' => 'To Be Announced',
            'role' => 'Keynote Address',
            'theme' => 'Intelligent Sustainable Manufacturing & Industry 5.0',
            'track' => 'Track 2',
            'status' => 'To Be Announced',
            'confirmed' => false,
            'image' => null,
        ],
        [
            'name' => 'To Be Announced',
            'role' => 'Keynote Address',
            'theme' => 'Artificial Intelligence & Digital Technologies in Engineering',
            'track' => 'Track 5',
            'status' => 'To Be Announced',
            'confirmed' => false,
            'image' => null,
        ],
        [
            'name' => 'To Be Announced',
            'role' => 'Keynote Address',
            'theme' => 'Smart & Sustainable Materials, Infrastructure & Energy Systems',
            'track' => 'Tracks 3 & 4',
            'status' => 'To Be Announced',
            'confirmed' => false,
            'image' => null,
        ],
    ],

    'reg_fees' => [
        ['category' => 'Students',           'early' => '₹1,500', 'regular' => '₹2,000', 'spot' => '₹2,500'],
        ['category' => 'Research Scholars',  'early' => '₹2,000', 'regular' => '₹2,580', 'spot' => '₹3,000'],
        ['category' => 'Academicians',       'early' => '₹2,500', 'regular' => '₹3,000', 'spot' => '₹3,500'],
        ['category' => 'Industry / Others',  'early' => '₹3,000', 'regular' => '₹3,580', 'spot' => '₹4,000'],
    ],

    // Publication Partners & Sponsors (Provisional State: Kept empty until formal agreements/approvals)
    'sponsors' => [],

    // Descriptive Industry Collaboration & Sponsorship Opportunities (Qualitative exploratory categories, no prices or tiers)
    'sponsorship_collaboration_areas' => [
        [
            'title' => 'Academic & Institutional Collaboration',
            'icon' => '🤝',
            'description' => 'Exploratory dialogue for academic, research, and professional organizations interested in supporting conference activities and sustainable engineering dialogues.',
            'engagement' => 'Exploratory discussions on institutional visibility, academic session support, and non-financial collaboration, subject to mutual agreement.',
        ],
        [
            'title' => 'Technical Track Collaboration',
            'icon' => '⚙️',
            'description' => 'Opportunities for technology and engineering organizations to explore collaborative engagement with thematic research tracks in mobility, manufacturing, materials, and energy.',
            'engagement' => 'Potential dialogue on industry-academic knowledge exchange and technical track interaction, pending formal review.',
        ],
        [
            'title' => 'Research Dissemination Support',
            'icon' => '📚',
            'description' => 'Exploratory engagement for academic societies and scholarly groups interested in supporting the academic dissemination of conference research.',
            'engagement' => 'Potential collaboration on scholarly visibility and research documentation support; formal publication arrangements remain subject to institutional approval.',
        ],
        [
            'title' => 'Student & Scholar Engagement',
            'icon' => '🏆',
            'description' => 'Exploratory avenues to encourage student participation, youth innovation initiatives, and emerging researcher interaction.',
            'engagement' => 'Potential opportunities to support student technical engagement; award frameworks and recognition models are exploratory and subject to committee approval.',
        ],
    ],

    // Industry Exhibition & Technology Showcase Focus Domains
    'exhibition_domains' => [
        [
            'title' => 'Automotive & Electric Mobility',
            'icon' => '🚗',
            'description' => 'Showcase next-generation electric vehicles, battery management systems, intelligent powertrains, charging infrastructure, and connected telemetry solutions.',
            'focus' => 'EV Prototypes, Battery Packs & Connected Mobility Solutions'
        ],
        [
            'title' => 'Intelligent Manufacturing & Industry 5.0',
            'icon' => '🏭',
            'description' => 'Demonstrate human-centric automation, cobotics, additive manufacturing systems, smart sensors, and digital twin technology for manufacturing plants.',
            'focus' => 'Robotics Demos, Smart Sensors & Industrial Automation Systems'
        ],
        [
            'title' => 'Sustainable Materials & Infrastructure',
            'icon' => '🏗️',
            'description' => 'Display bio-based polymers, circular engineering materials, non-destructive testing equipment, and net-zero smart infrastructure innovations.',
            'focus' => 'Eco-Materials, Circular Technologies & Net-Zero Solutions'
        ],
        [
            'title' => 'AI, IoT & Cyber-Physical Systems',
            'icon' => '🤖',
            'description' => 'Feature enterprise AI applications, computer vision automated inspection, edge IoT hardware, and industrial cybersecurity frameworks.',
            'focus' => 'Enterprise AI Demos, Edge IoT & Automated Quality Inspection'
        ],
        [
            'title' => 'Industry-Academia Collaborative R&D',
            'icon' => '🤝',
            'description' => 'Engage with MGM University faculty and engineering students on joint research testbeds, patent commercialization, and incubation projects.',
            'focus' => 'R&D Showcases, Technology Transfer & Industry-Ready Talent'
        ],
    ],

    'scopes' => [
        'Sustainable Automotive Mobility, Electric Vehicles & Powertrain Innovations',
        'Intelligent Sustainable Manufacturing, Smart Robotics & Industry 5.0',
        'Smart and Sustainable Materials, Infrastructure & Advanced Engineering',
        'Sustainable Energy Systems, Thermal Engineering & Renewable Energy Integration',
        'Artificial Intelligence, Digital Technologies & Cyber-Physical Systems',
        'Environmental Sustainability, Climate Resilience & Circular Economy Models',
    ],

    'objectives' => [
        'Provide a premier international forum bringing together academia, automotive professionals, industry leaders, and researchers to share breakthroughs in intelligent engineering and sustainable technologies.',
        'Promote sustainable automotive mobility, electric vehicles, and intelligent transportation solutions supporting climate resilience and decarbonization goals.',
        'Advance the integration of Industry 5.0, Human-Centric Manufacturing, Artificial Intelligence, and Digital Technologies across diverse engineering domains.',
        'Foster active linkages and collaborative partnerships between academic institutions and global industries through joint research, circular economy models, and technological exchange.',
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
        ['label' => 'Exhibition',      'target' => 'exhibition',      'page' => 'home'],
        ['label' => 'Sponsorship',     'target' => 'sponsorship',     'page' => 'home'],
        ['label' => 'Registration',    'target' => 'fees',            'page' => 'home'],
        ['label' => 'Venue',           'target' => 'venue',           'page' => 'home'],
        ['label' => 'Contact',         'target' => 'contact-section', 'page' => 'home'],
    ]
];

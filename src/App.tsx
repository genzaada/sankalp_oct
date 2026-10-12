import React, { useState, useEffect } from 'react'
import { motion, AnimatePresence } from 'framer-motion'

// ─── Animated Counter ─────────────────────────────────────────────────────────
function AnimatedCounter({ value }: { value: string }) {
  const numericMatch = value.match(/(\d+)/);
  const targetNumber = numericMatch ? parseInt(numericMatch[0], 10) : 0;
  const suffix = value.replace(/\d+/g, '');
  const [count, setCount] = useState(0);
  return (
    <motion.span
      initial={{ opacity: 0 }}
      whileInView={{ opacity: 1 }}
      viewport={{ once: true }}
      onViewportEnter={() => {
        let start = 0;
        const duration = 1200;
        const stepTime = 30;
        const steps = duration / stepTime;
        const increment = targetNumber / steps;
        const timer = setInterval(() => {
          start += increment;
          if (start >= targetNumber) { setCount(targetNumber); clearInterval(timer); }
          else { setCount(Math.floor(start)); }
        }, stepTime);
      }}
    >
      {count}{suffix}
    </motion.span>
  );
}

// ─── SVG Icon Set (outline, 1.5–2px stroke) ───────────────────────────────────
const Icon = {
  Calendar: () => (
    <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <rect x="3" y="4" width="18" height="18" rx="2" />
      <line x1="16" y1="2" x2="16" y2="6" /><line x1="8" y1="2" x2="8" y2="6" /><line x1="3" y1="10" x2="21" y2="10" />
    </svg>
  ),
  MapPin: () => (
    <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" /><circle cx="12" cy="10" r="3" />
    </svg>
  ),
  Clock: () => (
    <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <circle cx="12" cy="12" r="10" /><polyline points="12 6 12 12 16 14" />
    </svg>
  ),
  Download: () => (
    <svg className="w-4 h-4" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" /><polyline points="7 10 12 15 17 10" /><line x1="12" y1="15" x2="12" y2="3" />
    </svg>
  ),
  ArrowRight: () => (
    <svg className="w-4 h-4" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M5 12h14M12 5l7 7-7 7" />
    </svg>
  ),
  Check: () => (
    <svg className="w-4 h-4" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <polyline points="20 6 9 17 4 12" />
    </svg>
  ),
  Linkedin: () => (
    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
      <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
    </svg>
  ),
  Users: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" />
      <path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" />
    </svg>
  ),
  Globe: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <circle cx="12" cy="12" r="10" /><line x1="2" y1="12" x2="22" y2="12" />
      <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10z" />
    </svg>
  ),
  Mic: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z" />
      <path d="M19 10v2a7 7 0 0 1-14 0v-2" /><line x1="12" y1="19" x2="12" y2="22" /><line x1="8" y1="22" x2="16" y2="22" />
    </svg>
  ),
  Building: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <rect x="4" y="2" width="16" height="20" rx="2" />
      <line x1="9" y1="22" x2="9" y2="16" /><line x1="15" y1="22" x2="15" y2="16" /><line x1="9" y1="16" x2="15" y2="16" />
      <path d="M8 6h2v2H8V6zm6 0h2v2h-2V6zm-6 4h2v2H8v-2zm6 0h2v2h-2v-2z" />
    </svg>
  ),
  FileText: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
      <polyline points="14 2 14 8 20 8" /><line x1="16" y1="13" x2="8" y2="13" /><line x1="16" y1="17" x2="8" y2="17" />
    </svg>
  ),
  Award: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <circle cx="12" cy="8" r="7" /><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
    </svg>
  ),
  Menu: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" viewBox="0 0 24 24">
      <line x1="3" y1="12" x2="21" y2="12" /><line x1="3" y1="6" x2="21" y2="6" /><line x1="3" y1="18" x2="21" y2="18" />
    </svg>
  ),
  X: () => (
    <svg className="w-6 h-6" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" viewBox="0 0 24 24">
      <line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" />
    </svg>
  ),
  Facebook: () => (
    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
      <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6c.95 0 1.95.17 1.95.17v2.13h-1.08c-1 0-1.37.62-1.37 1.25V12h2.41l-.39 3h-2.02v6.8c4.56-.93 8-4.96 8-9.8z" />
    </svg>
  ),
  Twitter: () => (
    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
      <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
    </svg>
  ),
  Instagram: () => (
    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98C.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
    </svg>
  ),
  Youtube: () => (
    <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
      <path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.107C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.388.511a3.002 3.002 0 00-2.11 2.107C0 8.053 0 12 0 12s0 3.947.502 5.837a3.003 3.003 0 002.11 2.107c1.883.511 9.388.511 9.388.511s7.505 0 9.388-.511a3.002 3.002 0 002.11-2.107c.502-1.89.502-5.837.502-5.837s0-3.947-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
    </svg>
  ),
  Mail: () => (
    <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
      <polyline points="22,6 12,13 2,6" />
    </svg>
  ),
  Phone: () => (
    <svg className="w-5 h-5" fill="none" stroke="currentColor" strokeWidth="1.75" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
      <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13.1a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
    </svg>
  ),
}

// ─── Data ────────────────────────────────────────────────────────────────────
const STATS = [
  { Icon: Icon.Users, value: '500+', label: 'Participants' },
  { Icon: Icon.Globe, value: '50+', label: 'Countries' },
  { Icon: Icon.Mic, value: '120+', label: 'Speakers' },
  { Icon: Icon.Building, value: '200+', label: 'Institutions' },
  { Icon: Icon.FileText, value: '150+', label: 'Research Papers' },
  { Icon: Icon.Award, value: '10+', label: 'Keynote Sessions' },
]

const TRACKS = [
  {
    trackNum: 'Track 1',
    title: 'Sustainable Energy Systems and Decarbonization Technologies',
    icon: '⚡',
    topics: [
      'Renewable Energy Systems',
      'Energy Storage Technologies',
      'Smart Grids and Microgrids',
      'Hydrogen Energy Systems',
      'Carbon Capture and Emission Reduction',
      'Net-Zero Energy Solutions',
    ],
  },
  {
    trackNum: 'Track 2',
    title: 'Smart and Sustainable Built Environments',
    icon: '🏙️',
    topics: [
      'Intelligent Buildings',
      'Green and Net-Zero Buildings',
      'Smart Cities and Smart Districts',
      'Digital Twins for Infrastructure',
      'Sustainable Urban Development',
      'Building Energy Management Systems',
    ],
  },
  {
    trackNum: 'Track 3',
    title: 'Sustainable Manufacturing and Circular Economy',
    icon: '♻️',
    topics: [
      'Sustainable Manufacturing Technologies',
      'Industry 5.0 Applications',
      'Resource-Efficient Production',
      'Circular Economy Models',
      'Recycling and Waste Valorization',
      'Sustainable Supply Chains',
    ],
  },
  {
    trackNum: 'Track 4',
    title: 'Artificial Intelligence and Digital Technologies for Sustainability',
    icon: '🤖',
    topics: [
      'AI and Machine Learning Applications',
      'Big Data Analytics',
      'Internet of Things (IoT)',
      'Image Processing and Cloud Computing',
      'Digital Transformation for Sustainability',
      'Cyber-Physical Systems',
    ],
  },
  {
    trackNum: 'Track 5',
    title: 'Climate Change, Environmental Management and Resource Sustainability',
    icon: '🌿',
    topics: [
      'Climate Change Mitigation and Adaptation',
      'Environmental Impact Assessment',
      'Air and Water Quality Management',
      'Natural Resource Conservation',
      'Sustainable Agriculture Systems',
      'Environmental Monitoring Technologies',
    ],
  },
  {
    trackNum: 'Track 6',
    title: 'Sustainable Transportation and Resilient Infrastructure Systems',
    icon: '🚆',
    topics: [
      'Smart Transportation Systems',
      'Electric and Autonomous Vehicles',
      'Intelligent Road Infrastructure',
      'Structural Health Monitoring',
      'Infrastructure Resilience',
      'Disaster-Resistant Engineering Systems',
    ],
  },
]

const DATES = [
  { label: 'Paper Submission Deadline', date: '30 Sept, 2026', type: 'deadline' },
  { label: 'Notification of Acceptance', date: '31 Oct, 2026', type: 'info' },
  { label: 'Camera Ready Submission', date: '20 Nov, 2026', type: 'info' },
  { label: 'Early Bird Registration', date: '15 Nov, 2026', type: 'special' },
  { label: 'Conference Dates', date: '15–16 Feb, 2027', type: 'event' },
]

const SPEAKERS = [
  { name: 'Dr. Kai-Fu Lee', role: 'Chairman & CEO', org: 'Innovation Ventures, USA', image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&h=300&fit=crop&crop=faces&auto=format' },
  { name: 'Dr. Fei-Fei Li', role: 'Professor of AI', org: 'Stanford University, USA', image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=300&fit=crop&crop=faces&auto=format' },
  { name: 'Dr. R. A. Mashelkar', role: 'Former Director General', org: 'CSIR, India', image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=300&h=300&fit=crop&crop=faces&auto=format' },
  { name: 'Dr. Yann LeCun', role: 'VP & Chief AI Scientist', org: 'Meta, USA', image: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop&crop=faces&auto=format' },
]

const REG_FEES = [
  { category: 'Students', early: '₹1,500', regular: '₹2,000', spot: '₹2,500' },
  { category: 'Research Scholars', early: '₹2,000', regular: '₹2,580', spot: '₹3,000' },
  { category: 'Academicians', early: '₹2,500', regular: '₹3,000', spot: '₹3,500' },
  { category: 'Industry / Others', early: '₹3,000', regular: '₹3,580', spot: '₹4,000' },
]

const SPONSORS = [
  { name: 'IEEE' }, { name: 'Springer' }, { name: 'Scopus' },
  { name: 'Google' }, { name: 'Microsoft' }, { name: 'AWS' }, { name: 'Taylor & Francis' },
]

// ─── Conference Overview Data ─────────────────────────────────────────────────
const SANKALP_SCOPES = [
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
]

const OBJECTIVES = [
  'Provide an international platform for researchers, academicians, industry leaders, and policymakers to share recent advancements in sustainability science, engineering, and intelligent technologies.',
  'Promote research and innovation supporting global sustainability goals, climate resilience, decarbonization, and resource-efficient development.',
  'Facilitate collaboration among academia, industry, government organizations, and research institutions for addressing sustainability challenges through technology-driven solutions.',
  'Encourage the application of Artificial Intelligence, Knowledge Systems, Digital Technologies, and Industry 5.0 principles for sustainable engineering and infrastructure development.',
  'Showcase emerging technologies, best practices, and successful case studies in renewable energy, smart manufacturing, intelligent infrastructure, and environmental management.',
  'Strengthen global research networks and foster international partnerships for sustainable technological advancement and societal progress.',
]

const COMMITTEE = {
  Patrons: [
    { role: 'Chief Patron', name: 'Dr. Vilas S. Sapkal', org: 'Hon’ble Vice-Chancellor, MGM University' },
    { role: 'Patron', name: 'Dr. H. H. Shinde', org: 'Dean, School of Engineering & Technology, MGM University' },
    { role: 'Co-Patron', name: 'Dr. Ashish Gadekar', org: 'Registrar, MGM University' },
  ],
  Steering: [
    { role: 'General Chair', name: 'Dr. S. C. Tamane', org: 'School of Engineering & Technology, MGM University' },
    { role: 'Technical Program Chair', name: 'Dr. V. B. Musande', org: 'School of Engineering & Technology, MGM University' },
    { role: 'Finance Chair', name: 'Dr. B. M. Patil', org: 'School of Engineering & Technology, MGM University' },
  ],
  Advisory: [
    { role: 'International Advisor', name: 'Dr. Albert Y. Zomaya', org: 'University of Sydney, Australia' },
    { role: 'National Advisor', name: 'Dr. S. R. Sathe', org: 'VNIT Nagpur, India' },
    { role: 'Industry Advisor', name: 'Mr. Amit Kundal', org: 'Principal Designer, Samsung R&D' },
  ],
}

const COUNTDOWN_TARGET = new Date('2027-02-15T00:00:00Z');

// ─── Colour constants from the design system ──────────────────────────────────
const C = {
  primary900: '#0A4A47',
  primary700: '#0E5A56',
  primary500: '#127C6F',
  amber: '#F2B705',
  bgLight: '#F7F9FA',
  border: '#E5E7EB',
  heading: '#111827',
  body: '#6B7280',
}

export default function App() {
  const [currentPage, setCurrentPage] = useState<'home' | 'about'>('home');
  const [scrolled, setScrolled] = useState(false);
  const [speakerIndex, setSpeakerIndex] = useState(0);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [pendingScrollTarget, setPendingScrollTarget] = useState<string | null>(null);
  const [activeNav, setActiveNav] = useState<string>('Home');
  const [timeRemaining, setTimeRemaining] = useState({ days: 108, hours: 14, minutes: 32, seconds: 45 });

  useEffect(() => {
    const onScroll = () => {
      setScrolled(window.scrollY > 30);
      if (window.scrollY < 200) {
        setActiveNav(currentPage === 'home' ? 'Home' : 'About');
      }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, [currentPage]);

  useEffect(() => {
    const iv = setInterval(() => {
      const diff = COUNTDOWN_TARGET.getTime() - Date.now();
      if (diff <= 0) { clearInterval(iv); setTimeRemaining({ days: 0, hours: 0, minutes: 0, seconds: 0 }); return; }
      setTimeRemaining({
        days: Math.floor(diff / 86400000),
        hours: Math.floor((diff % 86400000) / 3600000),
        minutes: Math.floor((diff % 3600000) / 60000),
        seconds: Math.floor((diff % 60000) / 1000),
      });
    }, 1000);
    return () => clearInterval(iv);
  }, []);

  const scrollToTarget = (targetId: string) => {
    const el = document.getElementById(targetId);
    if (el) {
      const navbarHeight = 85;
      const elementPosition = el.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = Math.max(0, elementPosition - navbarHeight);
      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
      });
      return true;
    }
    return false;
  };

  const navigateTo = (page: 'home' | 'about') => {
    setMobileMenuOpen(false);
    setPendingScrollTarget(null);
    setActiveNav(page === 'home' ? 'Home' : 'About');
    if (currentPage !== page) {
      setCurrentPage(page);
    }
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const goToSection = (targetId: string, page: 'home' | 'about' = 'home', navLabel?: string) => {
    setMobileMenuOpen(false);
    if (navLabel) setActiveNav(navLabel);
    if (currentPage !== page) {
      setPendingScrollTarget(targetId);
      setCurrentPage(page);
    } else {
      scrollToTarget(targetId);
    }
  };

  // When switching pages to scroll to a specific section, wait for page to mount
  useEffect(() => {
    if (pendingScrollTarget) {
      let attempts = 0;
      const interval = setInterval(() => {
        attempts++;
        if (scrollToTarget(pendingScrollTarget) || attempts > 25) {
          clearInterval(interval);
          setPendingScrollTarget(null);
        }
      }, 40);
      return () => clearInterval(interval);
    }
  }, [currentPage, pendingScrollTarget]);

  const navLinks = [
    { label: 'Home', action: () => navigateTo('home'), active: activeNav === 'Home' && currentPage === 'home' },
    { label: 'About', action: () => navigateTo('about'), active: activeNav === 'About' && currentPage === 'about' },
    { label: 'Tracks', action: () => goToSection('tracks', 'home', 'Tracks'), active: activeNav === 'Tracks' && currentPage === 'home' },
    { label: 'Call for Papers', action: () => goToSection('cfp', 'home', 'Call for Papers'), active: activeNav === 'Call for Papers' && currentPage === 'home' },
    { label: 'Speakers', action: () => goToSection('speakers', 'home', 'Speakers'), active: activeNav === 'Speakers' && currentPage === 'home' },
    { label: 'Committee', action: () => goToSection('committee', 'about', 'Committee'), active: activeNav === 'Committee' && currentPage === 'about' },
    { label: 'Schedule', action: () => goToSection('dates', 'home', 'Schedule'), active: activeNav === 'Schedule' && currentPage === 'home' },
    { label: 'Registration', action: () => goToSection('fees', 'home', 'Registration'), active: activeNav === 'Registration' && currentPage === 'home' },
    { label: 'Venue', action: () => goToSection('venue-section', 'about', 'Venue'), active: activeNav === 'Venue' && currentPage === 'about' },
    { label: 'Contact', action: () => goToSection('contact-section', 'home', 'Contact'), active: activeNav === 'Contact' },
  ];

  return (
    <div className="min-h-screen font-body antialiased overflow-x-hidden w-full max-w-full relative" style={{ background: C.bgLight, color: C.heading }}>

      {/* ── Navigation ──────────────────────────────────────────────────────── */}
      <nav className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${scrolled ? 'bg-white shadow-md border-b py-3' : 'bg-white/90 backdrop-blur-md py-4'
        }`} style={{ borderColor: C.border }}>
        <div className="mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between" style={{ maxWidth: 1280 }}>

          {/* Logo */}
          <motion.div whileHover={{ scale: 1.04 }} whileTap={{ scale: 0.96 }}
            className="flex items-center gap-2.5 cursor-pointer" onClick={() => navigateTo('home')}>
            <svg className="w-9 h-9 text-white shadow-sm shrink-0" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50 5L88.9711 27.5V72.5L50 95L11.0289 72.5V27.5L50 5Z" fill={C.primary700} stroke={C.amber} strokeWidth="4" />
              <text x="50" y="60" fill="white" fontSize="30" fontWeight="bold" fontFamily="Poppins, sans-serif" textAnchor="middle">S</text>
            </svg>
            <div>
              <div className="font-display font-bold text-base leading-none" style={{ color: C.primary700 }}>SANKALP</div>
              <div className="font-mono text-[10px] font-medium tracking-widest" style={{ color: C.primary500 }}>2027</div>
            </div>
          </motion.div>

          {/* Desktop nav links */}
          <div className="hidden lg:flex items-center gap-5">
            {navLinks.map((link, i) => (
              <button key={i} onClick={link.action}
                className={`text-[13px] font-medium transition-colors cursor-pointer ${link.active ? 'border-b-2 pb-0.5 font-bold' : 'hover:opacity-70'}`}
                style={{ color: link.active ? C.primary700 : C.body, borderColor: link.active ? C.primary700 : 'transparent' }}>
                {link.label}
              </button>
            ))}
          </div>

          <div className="flex items-center gap-3">
            {/* Register Now — dark teal pill */}
            <motion.button whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}
              onClick={() => goToSection('fees', 'home', 'Registration')}
              className="hidden sm:flex items-center gap-1.5 px-5 py-2.5 text-xs font-bold tracking-wide uppercase text-white rounded-full shadow cursor-pointer"
              style={{ background: C.primary700 }}>
              Register Now <Icon.ArrowRight />
            </motion.button>
            <button onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="lg:hidden p-2 rounded-xl border cursor-pointer" style={{ color: C.heading, borderColor: C.border }}>
              {mobileMenuOpen ? <Icon.X /> : <Icon.Menu />}
            </button>
          </div>
        </div>

        {/* Mobile drawer */}
        <AnimatePresence>
          {mobileMenuOpen && (
            <motion.div initial={{ opacity: 0, height: 0 }} animate={{ opacity: 1, height: 'auto' }} exit={{ opacity: 0, height: 0 }}
              className="lg:hidden bg-white border-t px-6 pt-4 pb-6 overflow-hidden" style={{ borderColor: C.border }}>
              <div className="grid grid-cols-2 gap-2">
                {navLinks.map((link, i) => (
                  <button key={i} onClick={link.action}
                    className={`text-left text-xs font-semibold p-2.5 rounded-xl transition-colors ${link.active ? 'text-white' : ''}`}
                    style={{ background: link.active ? C.primary700 : 'transparent', color: link.active ? '#fff' : C.body }}>
                    {link.label}
                  </button>
                ))}
              </div>
            </motion.div>
          )}
        </AnimatePresence>
      </nav>

      {/* ── Page transitions ────────────────────────────────────────────────── */}
      <AnimatePresence mode="wait">
        <motion.div key={currentPage}
          initial={{ opacity: 0, y: 15 }} animate={{ opacity: 1, y: 0 }} exit={{ opacity: 0, y: -15 }}
          transition={{ duration: 0.35, ease: 'easeOut' }}>

          {currentPage === 'home' ? (
            <>
              {/* ── §4.2 Hero — deep teal diagonal gradient ──────────────────── */}
              <header className="relative text-white overflow-hidden pt-20"
                style={{ background: `linear-gradient(135deg, ${C.primary900} 0%, ${C.primary700} 55%, #0B3B3A 100%)` }}>

                {/* Subtle ambient glow */}
                <motion.div animate={{ opacity: [0.15, 0.3, 0.15] }} transition={{ duration: 8, repeat: Infinity, ease: 'easeInOut' }}
                  className="absolute right-0 top-0 w-[600px] h-[600px] rounded-full pointer-events-none"
                  style={{ background: 'rgba(18,124,111,0.18)', filter: 'blur(120px)' }} />

                <div className="relative z-10 mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 grid lg:grid-cols-12 gap-12 items-center" style={{ maxWidth: 1280 }}>

                  {/* Left column */}
                  <motion.div initial={{ opacity: 0, y: 30 }} animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
                    className="lg:col-span-7 flex flex-col items-start text-left">

                    {/* Pill badge */}
                    <motion.div initial={{ opacity: 0, scale: 0.9 }} animate={{ opacity: 1, scale: 1 }} transition={{ delay: 0.1 }}
                      className="pill-badge mb-6">
                      <span className="w-2 h-2 rounded-full animate-pulse" style={{ background: C.amber }}></span>
                      International Conference — SANKALP 2027
                    </motion.div>

                    {/* H1 — SANKALP Full Title */}
                    <motion.h1 initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.2 }}
                      className="font-display font-bold text-3xl sm:text-4xl md:text-5xl lg:text-[2.5rem] xl:text-[2.85rem] leading-tight tracking-tight mb-5 text-left">
                      International Conference on<br />
                      Sustainable Advances in eNgineering, Knowledge Systems,<br />
                      AI and InteLligent Technologies for Progress
                    </motion.h1>

                    {/* Subtitle */}
                    <motion.p initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.3 }}
                      className="text-sm md:text-base leading-relaxed max-w-lg mb-8 text-white/75">
                      Organized by School Of Engineering and Technology MGM University, Chhatrapati Sambhajinagar
                    </motion.p>

                    {/* Meta row — calendar, pin, clock */}
                    <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.4 }}
                      className="flex flex-col sm:flex-row flex-wrap gap-3 mb-10 text-sm">
                      {[
                        { Icon: Icon.Calendar, label: 'Conference Dates', value: '15-16 February 2027' },
                        { Icon: Icon.MapPin, label: 'Venue', value: 'School of Engineering & Technology, MGM University' },
                        { Icon: Icon.Clock, label: 'Early Bird Deadline', value: '15 Nov, 2026' },
                      ].map((item, i) => (
                        <motion.div key={i} whileHover={{ y: -2 }}
                          className="flex items-center gap-2.5 bg-white/10 border border-white/20 px-4 py-2.5 rounded-2xl backdrop-blur-sm">
                          <item.Icon />
                          <div>
                            <p className="text-[10px] uppercase font-mono tracking-wider text-white/60">{item.label}</p>
                            <p className="font-semibold text-white text-xs">{item.value}</p>
                          </div>
                        </motion.div>
                      ))}
                    </motion.div>

                    {/* CTAs — spec: solid WHITE "Register Now" + outline "Download Brochure" */}
                    <motion.div initial={{ opacity: 0, y: 20 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.5 }}
                      className="flex flex-wrap gap-3">
                      <motion.button whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}
                        onClick={() => goToSection('fees', 'home', 'Registration')}
                        className="flex items-center gap-2 px-7 py-3.5 text-xs font-bold uppercase tracking-wider rounded-full shadow-lg cursor-pointer"
                        style={{ background: '#fff', color: C.primary900 }}>
                        Register Now <Icon.ArrowRight />
                      </motion.button>
                      <motion.button whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}
                        onClick={() => {
                          const link = document.createElement('a');
                          link.href = '#';
                          link.setAttribute('download', 'SANKALP_Brochure.pdf');
                          document.body.appendChild(link);
                          link.click();
                          document.body.removeChild(link);
                        }}
                        className="btn-outline-white flex items-center gap-2 px-7 py-3.5 text-xs font-bold uppercase tracking-wider cursor-pointer">
                        Download Brochure <Icon.Download />
                      </motion.button>
                    </motion.div>
                  </motion.div>

                  {/* Right column — globe + countdown below */}
                  <motion.div initial={{ opacity: 0, scale: 0.92 }} animate={{ opacity: 1, scale: 1 }} transition={{ duration: 0.8, delay: 0.2 }}
                    className="lg:col-span-5 flex flex-col items-center gap-8">

                    {/* Globe illustration */}
                    <GlobeVisual />

                    {/* Countdown widget — spec: white card, 4 blocks, amber dot separators */}
                    <div className="w-full max-w-sm float-card p-6">
                      <p className="text-center font-mono text-[10px] uppercase tracking-widest font-semibold mb-4" style={{ color: C.primary500 }}>
                        Conference Begins In
                      </p>
                      <div className="flex items-center justify-center gap-1">
                        {[
                          { value: timeRemaining.days, label: 'Days' },
                          { value: timeRemaining.hours, label: 'Hours' },
                          { value: timeRemaining.minutes, label: 'Minutes' },
                          { value: timeRemaining.seconds, label: 'Seconds' },
                        ].map((unit, i) => (
                          <React.Fragment key={i}>
                            <div className="countdown-block px-3">
                              <span className="countdown-num">{String(unit.value).padStart(2, '0')}</span>
                              <span className="countdown-label">{unit.label}</span>
                            </div>
                            {i < 3 && <span className="countdown-sep">•</span>}
                          </React.Fragment>
                        ))}
                      </div>
                    </div>
                  </motion.div>
                </div>
              </header>

              {/* ── §4.3 Stats bar — overlaps hero bottom (negative margin) ────── */}
              <section className="relative z-10 -mt-10 pb-0 section-white">
                <div className="mx-auto px-4 sm:px-6 lg:px-8" style={{ maxWidth: 1280 }}>
                  <div className="float-card rounded-2xl px-6 py-5">
                    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                      {STATS.map((stat, i) => (
                        <motion.div key={i}
                          initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                          transition={{ delay: i * 0.08 }}
                          whileHover={{ y: -4 }}
                          className="flex flex-col items-center text-center py-3 gap-2">
                          <div className="icon-badge">
                            <stat.Icon />
                          </div>
                          <span className="font-display font-bold text-2xl" style={{ color: C.heading }}>
                            <AnimatedCounter value={stat.value} />
                          </span>
                          <span className="text-[11px] font-mono uppercase tracking-wider" style={{ color: C.body }}>{stat.label}</span>
                        </motion.div>
                      ))}
                    </div>
                  </div>
                </div>
              </section>

              {/* ── Conference Overview — scope, objectives, about host institution ──────── */}
              <ConferenceOverviewSection />

              {/* ── §4.4 About — white bg ────────────────────────────────────── */}
              <section className="section-white py-24 lg:py-32 overflow-hidden">

                <div className="mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-8 lg:gap-12 items-center" style={{ maxWidth: 1280 }}>

                  {/* Left */}
                  <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }} transition={{ duration: 0.6 }}
                    className="lg:col-span-6 text-left">
                    <h2 className="font-display font-bold text-3xl md:text-4xl leading-tight mb-5" style={{ color: C.heading }}>
                      Shaping the Future Through<br />
                      <span style={{ color: C.primary500 }}>Innovation &amp; Collaboration</span>
                    </h2>
                    <span className="heading-underline mb-6"></span>
                    <p className="text-sm md:text-[0.9375rem] leading-relaxed mb-8" style={{ color: C.body }}>
                      An International Conference that will provide a global platform for knowledge exchange, research dissemination, industry interaction, and collaborative innovation in sustainability-focused engineering and technology domains.
                    </p>

                    <p className="font-mono text-[11px] uppercase tracking-widest font-semibold mb-4" style={{ color: C.primary500 }}>Key Highlights</p>
                    <div className="grid sm:grid-cols-2 gap-3 mb-8">
                      {['High-quality paper presentations', 'Keynote talks from global experts', 'Workshops & technical sessions', 'Peer-reviewed conference proceedings'].map((item, i) => (
                        <motion.div key={i} whileHover={{ x: 3 }}
                          className="flex items-center gap-3 p-3 rounded-2xl border" style={{ background: C.bgLight, borderColor: C.border }}>
                          <div className="w-6 h-6 rounded-full flex items-center justify-center shrink-0" style={{ background: 'rgba(18,124,111,0.12)', color: C.primary700 }}>
                            <Icon.Check />
                          </div>
                          <span className="text-xs font-semibold" style={{ color: C.heading }}>{item}</span>
                        </motion.div>
                      ))}
                    </div>

                    <motion.button whileHover={{ scale: 1.04 }} whileTap={{ scale: 0.96 }}
                      onClick={() => navigateTo('about')}
                      className="btn-primary px-7 py-3.5 text-xs font-bold uppercase tracking-wider cursor-pointer">
                      Know More <Icon.ArrowRight />
                    </motion.button>
                  </motion.div>

                  {/* Right — extended horizontal photo */}
                  <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }} transition={{ duration: 0.6 }}
                    className="lg:col-span-6 relative flex items-stretch h-full w-full justify-center items-center">
                    {/* Subtle dot-grid decorative pattern top-right */}
                    <div className="absolute -top-4 -right-4 w-24 h-24 opacity-25 pointer-events-none z-0 hidden sm:block">
                      <svg className="w-full h-full text-teal-600" fill="currentColor" viewBox="0 0 100 100">
                        <pattern id="dot-grid-about" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
                          <circle cx="2" cy="2" r="2" />
                        </pattern>
                        <rect width="100" height="100" fill="url(#dot-grid-about)" />
                      </svg>
                    </div>

                    <div className="relative rounded-2xl overflow-hidden shadow-2xl w-full h-full min-h-[350px] md:min-h-[420px] border z-10" style={{ borderColor: C.border }}>
                      <img src="/AdminBulding.jpeg" alt="Admin Building"
                        className="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-700" />
                    </div>
                  </motion.div>
                </div>
              </section>

              {/* ── §4.5 Conference Tracks ─────── */}
              <section id="tracks" className="section-light py-24 scroll-mt-20 overflow-hidden">
                <div className="mx-auto px-4 sm:px-6 lg:px-8" style={{ maxWidth: 1280 }}>

                  <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }} className="text-center mb-14">
                    <h2 className="font-display font-bold text-3xl md:text-4xl uppercase tracking-tight mb-3" style={{ color: C.heading }}>
                      Conference Tracks
                    </h2>
                    {/* Teal underline accent beneath heading — spec §4.5 */}
                    <div className="mx-auto mt-2 w-14 h-1 rounded-full" style={{ background: C.primary500 }}></div>
                  </motion.div>

                  {/* 6 Comprehensive Track Cards Grid */}
                  <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    {TRACKS.map((track, i) => (
                      <motion.div key={i}
                        initial={{ opacity: 0, y: 24 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                        transition={{ delay: i * 0.08 }}
                        whileHover={{ y: -6, boxShadow: '0 16px 36px rgba(14,90,86,0.12)' }}
                        className="bg-white border rounded-2xl p-6 flex flex-col justify-between transition-all"
                        style={{ borderColor: C.border }}>
                        <div>
                          {/* Track Header */}
                          <div className="flex items-center justify-between mb-4">
                            <div className="w-12 h-12 rounded-xl flex items-center justify-center text-2xl shrink-0"
                              style={{ background: 'rgba(18,124,111,0.10)' }}>
                              {track.icon}
                            </div>
                            <span className="font-mono text-[10px] uppercase font-bold px-3 py-1 rounded-full"
                              style={{ background: 'rgba(18,124,111,0.12)', color: C.primary700 }}>
                              {track.trackNum}
                            </span>
                          </div>

                          <h3 className="font-display font-bold text-base leading-snug mb-4" style={{ color: C.heading }}>
                            {track.title}
                          </h3>

                          {/* Sub-topics List */}
                          <ul className="space-y-2.5 border-t pt-4" style={{ borderColor: C.border }}>
                            {track.topics.map((topic, ti) => (
                              <li key={ti} className="flex items-start gap-2.5 text-sm leading-relaxed" style={{ color: C.body }}>
                                <span className="w-1.5 h-1.5 rounded-full shrink-0 mt-2" style={{ background: C.primary500 }}></span>
                                <span>{topic}</span>
                              </li>
                            ))}
                          </ul>
                        </div>

                        {/* Card Footer */}
                        <div className="mt-5 pt-3 border-t flex items-center justify-between text-xs" style={{ borderColor: C.border }}>
                          <span className="font-mono text-[11px] text-gray-400">6 Sub-themes</span>
                          <button
                            onClick={() => goToSection('cfp', 'home', 'Call for Papers')}
                            className="font-semibold inline-flex items-center gap-1 transition-colors hover:underline cursor-pointer"
                            style={{ color: C.primary700 }}>
                            Submit to Track <Icon.ArrowRight />
                          </button>
                        </div>
                      </motion.div>
                    ))}
                  </div>

                  <div className="text-center">
                    <motion.button whileHover={{ scale: 1.04 }} whileTap={{ scale: 0.96 }}
                      onClick={() => goToSection('cfp', 'home', 'Call for Papers')}
                      className="btn-primary px-8 py-3.5 text-xs font-bold uppercase tracking-wider cursor-pointer">
                      Submit Your Paper to a Track <Icon.ArrowRight />
                    </motion.button>
                  </div>
                </div>
              </section>

              {/* ── §4.6 Important Dates + Keynote Speakers (split, white bg) ───── */}
              <section id="speakers" className="section-white py-24 scroll-mt-20 overflow-hidden">
                <div className="mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-10 items-start" style={{ maxWidth: 1280 }}>

                  {/* Left ~35%: Important Dates with teal vertical accent bar */}
                  <motion.div id="dates" initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                    className="lg:col-span-4 scroll-mt-24">
                    <div className="flex items-center gap-3 mb-5">
                      <div className="w-1 h-5 rounded-full" style={{ background: C.primary700 }}></div>
                      <span className="font-mono text-[11px] uppercase tracking-widest font-bold" style={{ color: C.primary700 }}>Important Dates</span>
                    </div>

                    <div className="card p-5 space-y-1">
                      {DATES.map((date, i) => (
                        <div key={i} className={`flex justify-between items-center px-3 py-3 rounded-xl border ${date.type === 'deadline' ? 'bg-rose-50 border-rose-100' :
                          date.type === 'event' ? 'border-teal-100' : 'border-transparent'
                          }`} style={{ background: date.type === 'event' ? 'rgba(18,124,111,0.06)' : undefined }}>
                          <span className={`text-xs font-semibold ${date.type === 'deadline' ? 'text-rose-700' : ''}`}
                            style={{ color: date.type === 'deadline' ? undefined : C.heading }}>{date.label}</span>
                          <span className="font-mono text-[11px] font-bold px-2.5 py-1 rounded-lg border bg-white"
                            style={{ color: C.primary700, borderColor: C.border }}>{date.date}</span>
                        </div>
                      ))}
                      <div className="pt-3 text-center">
                        <button className="text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1 transition-opacity hover:opacity-70 cursor-pointer"
                          style={{ color: C.primary500 }}>
                          View All Dates <Icon.ArrowRight />
                        </button>
                      </div>
                    </div>
                  </motion.div>

                  {/* Right ~65%: Keynote Speakers */}
                  <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                    className="lg:col-span-8">
                    <div className="flex items-center justify-between mb-5">
                      <div className="flex items-center gap-3">
                        <div className="w-1 h-5 rounded-full" style={{ background: C.primary700 }}></div>
                        <span className="font-mono text-[11px] uppercase tracking-widest font-bold" style={{ color: C.primary700 }}>Keynote Speakers</span>
                      </div>
                      <button className="text-[11px] font-bold uppercase tracking-wider inline-flex items-center gap-1 hover:opacity-70 cursor-pointer"
                        style={{ color: C.primary500 }}>View All Speakers <Icon.ArrowRight /></button>
                    </div>

                    <div className="card p-5">
                      {/* Desktop 4-col grid */}
                      <div className="hidden sm:grid grid-cols-2 md:grid-cols-4 gap-4">
                        {SPEAKERS.map((sp, i) => (
                          <motion.div key={i} whileHover={{ y: -5 }}
                            className="flex flex-col items-center text-center p-4 rounded-2xl border transition-all cursor-pointer"
                            style={{ borderColor: C.border, background: C.bgLight }}>
                            <div className="w-20 h-20 rounded-full overflow-hidden mb-3 border-2 shadow-sm"
                              style={{ borderColor: 'rgba(14,90,86,0.2)' }}>
                              <img src={sp.image} alt={sp.name} className="w-full h-full object-cover" />
                            </div>
                            <h4 className="font-display font-bold text-xs leading-tight mb-1" style={{ color: C.heading }}>{sp.name}</h4>
                            <p className="text-[10px] mb-0.5" style={{ color: C.body }}>{sp.role}</p>
                            <p className="text-[10px] font-mono mb-3" style={{ color: C.body }}>{sp.org}</p>
                            <a href="#" onClick={e => e.stopPropagation()}
                              className="w-7 h-7 rounded-full flex items-center justify-center transition-all text-white"
                              style={{ background: C.primary700 }}
                              aria-label={`LinkedIn — ${sp.name}`}>
                              <Icon.Linkedin />
                            </a>
                          </motion.div>
                        ))}
                      </div>

                      {/* Mobile snap slider */}
                      <div className="sm:hidden flex overflow-x-auto snap-x snap-mandatory gap-4 pb-2 scrollbar-none">
                        {SPEAKERS.map((sp, i) => (
                          <div key={i} className="snap-center shrink-0 w-52 flex flex-col items-center text-center p-4 rounded-2xl border"
                            style={{ borderColor: C.border, background: C.bgLight }}>
                            <div className="w-20 h-20 rounded-full overflow-hidden mb-3 border-2"
                              style={{ borderColor: 'rgba(14,90,86,0.2)' }}>
                              <img src={sp.image} alt={sp.name} className="w-full h-full object-cover" />
                            </div>
                            <h4 className="font-display font-bold text-xs mb-1" style={{ color: C.heading }}>{sp.name}</h4>
                            <p className="text-[10px] mb-0.5" style={{ color: C.body }}>{sp.role}</p>
                            <p className="text-[10px] font-mono mb-3" style={{ color: C.body }}>{sp.org}</p>
                            <a href="#" className="w-7 h-7 rounded-full flex items-center justify-center text-white"
                              style={{ background: C.primary700 }} aria-label={`LinkedIn — ${sp.name}`}>
                              <Icon.Linkedin />
                            </a>
                          </div>
                        ))}
                      </div>

                      {/* Carousel dots */}
                      <div className="flex justify-center gap-1.5 mt-4">
                        {[0, 1, 2].map(i => (
                          <button key={i} onClick={() => setSpeakerIndex(i)}
                            className="h-2 rounded-full transition-all cursor-pointer"
                            style={{ width: speakerIndex === i ? 20 : 8, background: speakerIndex === i ? C.primary700 : C.border }} />
                        ))}
                      </div>
                    </div>
                  </motion.div>
                </div>
              </section>

              {/* ── §4.7 Call for Papers + Registration Fee (off-white bg) ───────── */}
              <section id="fees" className="section-light py-24 scroll-mt-20 overflow-hidden">
                <div className="mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-10 items-start" style={{ maxWidth: 1280 }}>

                  {/* Left ~35%: dark teal CfP card */}
                  <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                    id="cfp" className="lg:col-span-4 h-full scroll-mt-24">
                    <div className="rounded-2xl p-8 h-full flex flex-col gap-6 relative overflow-hidden text-white"
                      style={{ background: `linear-gradient(150deg, ${C.primary700} 0%, ${C.primary900} 100%)` }}>
                      <div className="absolute -right-8 -bottom-8 w-40 h-40 rounded-full opacity-10"
                        style={{ background: '#fff', filter: 'blur(40px)' }} />

                      <div>
                        <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-white/25 text-[10px] font-mono uppercase mb-4 text-white/80">
                          Submit Paper
                        </div>
                        <h3 className="font-display font-bold text-2xl uppercase tracking-wide mb-3">Call For Papers</h3>
                        <p className="text-sm leading-relaxed text-white/75 max-w-[85%]">
                          We invite original research papers, case studies and review papers in AI, Emerging Technologies and Future Systems. All accepted papers published in Scopus Indexed proceedings.
                        </p>
                      </div>

                      {/* SVG Megaphone + Document Illustration bottom-right */}
                      <div className="absolute right-2 bottom-2 w-28 h-28 opacity-10 pointer-events-none z-0">
                        <svg className="w-full h-full text-white" fill="none" stroke="currentColor" strokeWidth="1.25" strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
                          {/* Document */}
                          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                          <polyline points="14 2 14 8 20 8" />
                          {/* Megaphone */}
                          <path d="M18 8a3 3 0 0 1 3 3v2a3 3 0 0 1-3 3h-1l-3 3v-9l3 3h1z" fill="currentColor" />
                        </svg>
                      </div>

                      <div className="flex flex-col gap-3 mt-auto z-10">
                        <motion.button whileHover={{ scale: 1.03 }} whileTap={{ scale: 0.97 }}
                          onClick={() => window.open('http://localhost:5174', '_blank')}
                          className="btn-amber py-3.5 px-6 text-xs font-bold uppercase tracking-wider cursor-pointer justify-center">
                          Submit Your Paper <Icon.ArrowRight />
                        </motion.button>
                        <motion.button whileHover={{ scale: 1.02 }} whileTap={{ scale: 0.98 }}
                          onClick={() => {
                            const link = document.createElement('a');
                            link.href = '#';
                            link.setAttribute('download', 'Paper_Guidelines.pdf');
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                          }}
                          className="btn-outline-white py-3.5 px-6 text-xs font-bold uppercase tracking-wider cursor-pointer justify-center">
                          <Icon.Download /> Paper Guidelines
                        </motion.button>
                      </div>
                    </div>
                  </motion.div>

                  {/* Right ~65%: Registration Fee table */}
                  <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                    className="lg:col-span-8">
                    <div className="flex items-center justify-between mb-5">
                      <div className="flex items-center gap-3">
                        <div className="w-1 h-5 rounded-full" style={{ background: C.primary700 }}></div>
                        <span className="font-mono text-[11px] uppercase tracking-widest font-bold" style={{ color: C.primary700 }}>Registration Fee</span>
                      </div>
                      <span className="flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase"
                        style={{ background: C.amber, color: C.primary900 }}>
                        🔥 Early Bird Open
                      </span>
                    </div>

                    {/* Desktop table */}
                    <div className="hidden md:block card p-6">
                      <table className="w-full text-left text-xs border-collapse">
                        <thead>
                          <tr style={{ borderBottom: `2px solid ${C.border}` }}>
                            <th className="py-3 font-semibold" style={{ color: C.body }}>Category</th>
                            <th className="py-3 px-4 font-bold rounded-t-xl" style={{ color: C.primary700, background: 'rgba(18,124,111,0.07)' }}>
                              Early Bird
                              <span className="ml-2 px-1.5 py-0.5 rounded-full text-[9px] font-bold" style={{ background: C.amber, color: C.primary900 }}>Best Value</span>
                              <span className="block text-[10px] font-normal mt-0.5" style={{ color: C.primary500 }}>Till 15 Nov, 2026</span>
                            </th>
                            <th className="py-3 font-semibold" style={{ color: C.body }}>
                              Regular
                              <span className="block text-[10px] font-normal" style={{ color: C.body }}>Till 31 Dec, 2026</span>
                            </th>
                            <th className="py-3 font-semibold" style={{ color: C.body }}>On Spot</th>
                          </tr>
                        </thead>
                        <tbody>
                          {REG_FEES.map((row, i) => (
                            <tr key={i} className="transition-colors hover:bg-slate-50" style={{ borderBottom: `1px solid ${C.border}` }}>
                              <td className="py-4 font-semibold" style={{ color: C.heading }}>{row.category}</td>
                              <td className="py-4 px-4 font-mono font-bold text-sm" style={{ color: C.primary700, background: 'rgba(18,124,111,0.05)' }}>{row.early}</td>
                              <td className="py-4 font-mono" style={{ color: C.body }}>{row.regular}</td>
                              <td className="py-4 font-mono" style={{ color: C.body }}>{row.spot}</td>
                            </tr>
                          ))}
                        </tbody>
                      </table>
                      <div className="mt-5 pt-4 flex items-center justify-between" style={{ borderTop: `1px solid ${C.border}` }}>
                        <span className="text-xs" style={{ color: C.body }}>All fees include access to all sessions &amp; proceedings kit.</span>
                        <motion.button whileHover={{ scale: 1.05 }} whileTap={{ scale: 0.95 }}
                          onClick={() => goToSection('contact-section', 'home', 'Contact')}
                          className="btn-primary px-6 py-2.5 text-xs font-bold uppercase tracking-wider cursor-pointer">
                          Register Now <Icon.ArrowRight />
                        </motion.button>
                      </div>
                    </div>

                    {/* Mobile cards */}
                    <div className="md:hidden space-y-4">
                      {REG_FEES.map((fee, i) => (
                        <div key={i} className="card p-5">
                          <div className="flex justify-between items-start mb-4">
                            <h4 className="font-display font-bold text-base" style={{ color: C.heading }}>{fee.category}</h4>
                            <span className="px-2 py-0.5 rounded-full text-[9px] font-bold uppercase" style={{ background: C.amber, color: C.primary900 }}>Early Bird</span>
                          </div>
                          <div className="rounded-xl p-4 mb-4" style={{ background: 'rgba(18,124,111,0.08)', border: `1px solid rgba(18,124,111,0.2)` }}>
                            <span className="text-[10px] font-mono uppercase font-bold block mb-1" style={{ color: C.primary700 }}>Early Bird (Till 15 Nov)</span>
                            <span className="font-mono font-bold text-2xl" style={{ color: C.primary700 }}>{fee.early}</span>
                          </div>
                          <div className="grid grid-cols-2 gap-3 mb-4 text-xs font-mono">
                            {[{ label: 'Regular (Till 31 Dec)', v: fee.regular }, { label: 'On Spot', v: fee.spot }].map((r, j) => (
                              <div key={j} className="p-2.5 rounded-xl border" style={{ borderColor: C.border, background: C.bgLight }}>
                                <span className="block text-[9px] uppercase mb-1" style={{ color: C.body }}>{r.label}</span>
                                <span className="font-bold" style={{ color: C.heading }}>{r.v}</span>
                              </div>
                            ))}
                          </div>
                          <button onClick={() => goToSection('contact-section', 'home', 'Contact')} className="btn-primary w-full py-3 text-xs font-bold uppercase tracking-wider cursor-pointer justify-center">
                            Register Now <Icon.ArrowRight />
                          </button>
                        </div>
                      ))}
                    </div>
                  </motion.div>
                </div>
              </section>

              {/* ── §4.8 Publication Partners — white bg ────────────────────────── */}
              <section className="section-white py-16 overflow-hidden">
                <div className="mx-auto px-4 sm:px-6 lg:px-8 text-center" style={{ maxWidth: 1280 }}>
                  <p className="font-display font-bold text-xs uppercase tracking-widest mb-8" style={{ color: C.heading }}>
                    Publication Partners &amp; Sponsors
                  </p>
                  
                  {/* Scrolling Marquee */}
                  <div className="relative w-full overflow-hidden mb-8">
                    <div className="flex gap-4 w-[200%] marquee-track">
                      {/* First set */}
                      {SPONSORS.map((s, i) => (
                        <div key={`marquee-1-${i}`} className="px-8 py-4 shrink-0 rounded-2xl border bg-slate-50 flex items-center justify-center min-w-[160px]"
                          style={{ borderColor: C.border }}>
                          <span className="font-display font-bold text-xs uppercase tracking-wider text-gray-700">{s.name}</span>
                        </div>
                      ))}
                      {/* Duplicate set for loop */}
                      {SPONSORS.map((s, i) => (
                        <div key={`marquee-2-${i}`} className="px-8 py-4 shrink-0 rounded-2xl border bg-slate-50 flex items-center justify-center min-w-[160px]"
                          style={{ borderColor: C.border }}>
                          <span className="font-display font-bold text-xs uppercase tracking-wider text-gray-700">{s.name}</span>
                        </div>
                      ))}
                    </div>
                  </div>

                  {/* Manual Arrow Controls */}
                  <div className="relative max-w-4xl mx-auto flex items-center gap-4">
                    <button onClick={() => {
                      const track = document.getElementById('sponsor-track');
                      if (track) track.scrollLeft -= 220;
                    }} className="w-8 h-8 rounded-full border flex items-center justify-center hover:bg-slate-100 text-gray-600 transition-colors z-10 shrink-0 cursor-pointer shadow-sm bg-white" style={{ borderColor: C.border }} aria-label="Scroll left">
                      &lsaquo;
                    </button>

                    <div id="sponsor-track" className="overflow-x-auto scroll-smooth w-full scrollbar-none flex gap-4 py-2">
                      {SPONSORS.map((s, i) => (
                        <motion.div key={i} whileHover={{ y: -3, scale: 1.05 }}
                          className="px-8 py-4 shrink-0 rounded-2xl border bg-slate-50 flex items-center justify-center min-w-[160px] cursor-pointer"
                          style={{ borderColor: C.border }}>
                          <span className="font-display font-bold text-xs uppercase tracking-wider text-gray-700">{s.name}</span>
                        </motion.div>
                      ))}
                    </div>

                    <button onClick={() => {
                      const track = document.getElementById('sponsor-track');
                      if (track) track.scrollLeft += 220;
                    }} className="w-8 h-8 rounded-full border flex items-center justify-center hover:bg-slate-100 text-gray-600 transition-colors z-10 shrink-0 cursor-pointer shadow-sm bg-white" style={{ borderColor: C.border }} aria-label="Scroll right">
                      &rsaquo;
                    </button>
                  </div>
                </div>
              </section>
            </>

          ) : (
            /* ── About page ───────────────────────────────────────────────── */
            <main className="pt-20 min-h-screen">
              {/* Hero banner */}
              <section className="text-white py-20 text-center relative overflow-hidden"
                style={{ background: `linear-gradient(135deg, ${C.primary900} 0%, ${C.primary700} 100%)` }}>
                <div className="mx-auto px-4 relative z-10" style={{ maxWidth: 1280 }}>
                  <motion.div initial={{ opacity: 0, scale: 0.9 }} animate={{ opacity: 1, scale: 1 }}
                    className="pill-badge inline-flex mb-5">SANKALP 2027</motion.div>
                  <motion.h1 initial={{ opacity: 0, y: 15 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.1 }}
                    className="font-display font-bold text-3xl md:text-5xl mb-4">
                    About the Conference &amp; Host Institution
                  </motion.h1>
                  <motion.p initial={{ opacity: 0, y: 15 }} animate={{ opacity: 1, y: 0 }} transition={{ delay: 0.2 }}
                    className="text-sm max-w-xl mx-auto text-white/75">
                    Promoting sustainable engineering, knowledge systems, and intelligent technologies at School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar.
                  </motion.p>
                </div>
              </section>

              {/* Content */}
              <section className="section-light py-16">
                <div className="mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-12" style={{ maxWidth: 1280 }}>

                  <div className="lg:col-span-8 space-y-8">
                    {/* Vision */}
                    <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                      className="card p-8 text-left">
                      <h2 className="font-display font-bold text-xl mb-4" style={{ color: C.primary700 }}>Conference Vision &amp; Goal</h2>
                      <p className="text-sm leading-relaxed mb-3" style={{ color: C.body }}>
                        The primary vision of SANKALP 2027 is to provide an international forum for cutting-edge computing research. We aim to inspire multidisciplinary cooperation, explore technological convergence, and drive development in automation, neural systems, cybersecurity, and data-driven sciences.
                      </p>
                      <p className="text-sm leading-relaxed" style={{ color: C.body }}>
                        Scholars and developers from all over the world gather to build active linkages between academia and industry. School of Engineering and Technology, MGM University proudly hosts this elite ecosystem.
                      </p>
                    </motion.div>

                    {/* Host institution */}
                    <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                      className="card p-8 grid md:grid-cols-2 gap-6 items-center">
                      <div>
                        <h2 className="font-display font-bold text-xl mb-3" style={{ color: C.primary700 }}>Organizing Institution</h2>
                        <h3 className="font-semibold text-sm mb-2" style={{ color: C.heading }}>School of Engineering and Technology (SOET), MGM University</h3>
                        <p className="text-sm leading-relaxed mb-3" style={{ color: C.body }}>
                          The School of Engineering and Technology (SOET), MGM University, is a multidisciplinary engineering institution dedicated to excellence in education, research, innovation, and industry engagement. The School offers undergraduate and Diploma programs in emerging areas of engineering and technology and actively promotes interdisciplinary research addressing contemporary industrial and societal challenges.
                        </p>
                        <p className="text-sm leading-relaxed" style={{ color: C.body }}>
                          MGM University, located in Chhatrapati Sambhajinagar (Aurangabad), Maharashtra, is a State Private University established under the MGM University Act, 2019, promoted by the Mahatma Gandhi Mission Trust with over four decades of legacy.
                        </p>
                      </div>
                      <div className="rounded-2xl overflow-hidden aspect-[4/3] border"
                        style={{ borderColor: C.border, background: '#20181B' }}>
                        <img src="/mgm_university.png" alt="MGM University & SOET" className="w-full h-full object-cover object-center block" />
                      </div>
                    </motion.div>

                    {/* Committee */}
                    <motion.div id="committee" initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
                      className="card p-8 scroll-mt-24">
                      <h2 className="font-display font-bold text-xl mb-6" style={{ color: C.primary700 }}>Organizing Committee</h2>
                      <div className="space-y-6">
                        {Object.entries(COMMITTEE).map(([cat, members]) => (
                          <div key={cat} className="border-t pt-4 first:border-t-0 first:pt-0" style={{ borderColor: C.border }}>
                            <h3 className="font-mono text-[11px] uppercase tracking-wider font-bold mb-3" style={{ color: C.primary500 }}>{cat}</h3>
                            <div className="grid sm:grid-cols-3 gap-3">
                              {members.map((m, mi) => (
                                <div key={mi} className="p-3 rounded-xl border" style={{ background: C.bgLight, borderColor: C.border }}>
                                  <p className="text-[9px] font-mono uppercase tracking-wide mb-1" style={{ color: C.body }}>{m.role}</p>
                                  <p className="font-bold text-xs mb-0.5" style={{ color: C.heading }}>{m.name}</p>
                                  <p className="text-[10px] leading-snug" style={{ color: C.body }}>{m.org}</p>
                                </div>
                              ))}
                            </div>
                          </div>
                        ))}
                      </div>
                    </motion.div>
                  </div>

                  {/* Sidebar */}
                  <div id="venue-section" className="lg:col-span-4 space-y-6 scroll-mt-24">
                    <div className="rounded-2xl p-7 text-white" style={{ background: `linear-gradient(150deg, ${C.primary700} 0%, ${C.primary900} 100%)` }}>
                      <h3 className="font-display font-bold text-base mb-4 flex items-center gap-2">
                        <Icon.MapPin /> Venue Details
                      </h3>
                      <div className="space-y-3 text-xs text-white/80">
                        <div><p className="font-mono text-[9px] uppercase tracking-wider text-white/50 mb-0.5">Location</p>
                          <p className="font-semibold text-white">School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra 431003</p></div>
                        <div><p className="font-mono text-[9px] uppercase tracking-wider text-white/50 mb-0.5">How to Reach</p>
                          <p>Connected by air (Chhatrapati Sambhajinagar Airport - IXU), rail, and national highways with direct connectivity to Mumbai, Pune, and Delhi.</p></div>
                      </div>
                    </div>

                    <div className="card p-6">
                      <h3 className="font-display font-bold text-sm mb-3" style={{ color: C.heading }}>Chhatrapati Sambhajinagar Tourism &amp; Heritage</h3>
                      <p className="text-xs leading-relaxed mb-3" style={{ color: C.body }}>
                        World-renowned for the UNESCO World Heritage Sites of Ajanta and Ellora Caves, Bibi Ka Maqbara, and rich cultural heritage.
                      </p>
                      <div className="rounded-2xl overflow-hidden aspect-video border" style={{ borderColor: C.border }}>
                        <img src="https://images.unsplash.com/photo-1590050752117-238cb0fb12b1?w=400&h=200&fit=crop&auto=format" alt="Ajanta & Ellora Heritage" className="w-full h-full object-cover" />
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </main>
          )}
        </motion.div>
      </AnimatePresence>

      {/* ── §4.9 Footer — full-width solid dark teal ────────────────────────── */}
      <footer id="contact-section" className="pt-16 pb-8 relative overflow-hidden text-white/70 scroll-mt-16"
        style={{ background: C.primary900, borderTop: `1px solid rgba(255,255,255,0.08)` }}>

        <div className="absolute right-0 bottom-0 w-80 h-80 rounded-full pointer-events-none"
          style={{ background: 'rgba(18,124,111,0.15)', filter: 'blur(80px)' }} />

        <div className="mx-auto px-4 sm:px-6 lg:px-8 relative z-10 grid md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12" style={{ maxWidth: 1280 }}>

          {/* Col 1: Logo + description + social icons */}
          <div className="space-y-4 text-left">
            <div className="flex items-center gap-2.5">
              <svg className="w-9 h-9 text-white shadow-sm shrink-0" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 5L88.9711 27.5V72.5L50 95L11.0289 72.5V27.5L50 5Z" fill={C.primary700} stroke={C.amber} strokeWidth="4" />
                <text x="50" y="60" fill="white" fontSize="30" fontWeight="bold" fontFamily="Poppins, sans-serif" textAnchor="middle">S</text>
              </svg>
              <div>
                <div className="font-display font-bold text-white text-base leading-none">SANKALP</div>
                <div className="font-mono text-[10px] tracking-widest" style={{ color: 'rgba(255,255,255,0.5)' }}>2027</div>
              </div>
            </div>
            <p className="text-xs leading-relaxed text-white/60">
              International Conference on Sustainable Advances in eNgineering, Knowledge Systems, AI and InteLligent Technologies for Progress. Uniting researchers, academicians, and industry experts globally.
            </p>
            {/* Social icons — circular outline badges */}
            <div className="flex gap-2.5 pt-1">
              {[Icon.Facebook, Icon.Twitter, Icon.Linkedin, Icon.Instagram, Icon.Youtube].map((SocialIcon, i) => (
                <motion.a key={i} href="#" whileHover={{ y: -3, scale: 1.1 }}
                  className="w-8 h-8 rounded-full flex items-center justify-center transition-all text-white/60 hover:text-white"
                  style={{ border: '1px solid rgba(255,255,255,0.2)', background: 'rgba(255,255,255,0.05)' }}>
                  <SocialIcon />
                </motion.a>
              ))}
            </div>
          </div>

          {/* Col 2: Quick Links — two sub-columns */}
          <div>
            <h4 className="font-mono text-[10px] uppercase tracking-widest font-bold mb-4 text-white/50">Quick Links</h4>
            <div className="grid grid-cols-2 gap-x-4 gap-y-2 text-xs">
              {navLinks.map((link, i) => (
                <button key={i} onClick={link.action}
                  className="text-left text-white/60 hover:text-white transition-colors cursor-pointer group inline-flex items-center gap-1">
                  <span className="opacity-0 group-hover:opacity-100 transition-opacity" style={{ color: C.amber }}>&rsaquo;</span>
                  {link.label}
                </button>
              ))}
            </div>
          </div>

          {/* Col 3: Contact */}
          <div>
            <h4 className="font-mono text-[10px] uppercase tracking-widest font-bold mb-4 text-white/50">Contact Us</h4>
            <div className="space-y-3 text-xs">
              <div className="flex gap-2.5 text-white/60">
                <span className="shrink-0 mt-0.5"><Icon.MapPin /></span>
                <span>School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar, Maharashtra 431003</span>
              </div>
              <div className="flex items-center gap-2.5 text-white/60">
                <Icon.Mail />
                <a href="mailto:sankalp@mgmu.ac.in" className="hover:text-white transition-colors">sankalp@mgmu.ac.in</a>
              </div>
              <div className="flex items-center gap-2.5 text-white/60">
                <Icon.Phone />
                <a href="tel:+911234567890" className="hover:text-white transition-colors">+91 1234 567890</a>
              </div>
            </div>
          </div>

          {/* Col 4: Newsletter */}
          <div>
            <h4 className="font-mono text-[10px] uppercase tracking-widest font-bold mb-4 text-white/50">Newsletter</h4>
            <p className="text-xs leading-relaxed mb-4 text-white/60">
              Subscribe for news, deadline reminders, and conference updates.
            </p>
            <form onSubmit={e => e.preventDefault()} className="flex flex-col gap-2.5">
              <input type="email" placeholder="Enter your email" required
                className="text-xs px-4 py-3 rounded-xl outline-none text-white placeholder-white/30 transition-colors"
                style={{ background: 'rgba(255,255,255,0.08)', border: '1px solid rgba(255,255,255,0.15)' }} />
              <motion.button whileHover={{ scale: 1.02 }} whileTap={{ scale: 0.98 }} type="submit"
                className="btn-amber py-3 text-xs font-bold uppercase tracking-wider cursor-pointer justify-center">
                Subscribe
              </motion.button>
            </form>
          </div>
        </div>

        {/* Bottom bar */}
        <div className="mx-auto px-4 sm:px-6 lg:px-8 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-white/40"
          style={{ maxWidth: 1280, borderTop: '1px solid rgba(255,255,255,0.08)' }}>
          <span>&copy; 2027 SANKALP. All rights reserved. School of Engineering and Technology, MGM University, Chhatrapati Sambhajinagar.</span>
          <div className="flex gap-5">
            <a href="#" className="hover:text-white transition-colors">Privacy Policy</a>
            <span>·</span>
            <a href="#" className="hover:text-white transition-colors">Terms &amp; Conditions</a>
          </div>
        </div>
      </footer>
    </div>
  );
}

// ─── Conference Overview Section ─────────────────────────────────────────────
function ConferenceOverviewSection() {
  return (
    <section id="overview" className="section-light py-24">
      <div className="mx-auto px-4 sm:px-6 lg:px-8" style={{ maxWidth: 1280 }}>

        {/* Section header */}
        <motion.div initial={{ opacity: 0, y: 20 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
          className="text-center mb-14">
          <p className="eyebrow mb-3">Conference Overview</p>
          <h2 className="font-display font-bold text-3xl md:text-4xl leading-tight" style={{ color: C.heading }}>
            About the Conference
          </h2>
          <div className="mx-auto mt-3 w-14 h-1 rounded-full" style={{ background: C.primary500 }}></div>
        </motion.div>

        <ConferenceScopeSection />
        <ConferenceObjectivesSection />
        <AboutHostInstitutionSection />

      </div>
    </section>
  );
}

// ─── Conference Scope Section ─────────────────────────────────────────────────
function ConferenceScopeSection() {
  return (
    <div className="mb-14">
      <motion.div initial={{ opacity: 0, x: -20 }} whileInView={{ opacity: 1, x: 0 }} viewport={{ once: true }}
        className="flex items-center gap-3 mb-6">
        <div className="w-1 h-5 rounded-full shrink-0" style={{ background: C.primary700 }}></div>
        <span className="font-mono text-[11px] uppercase tracking-widest font-bold" style={{ color: C.primary700 }}>
          SANKALP-2027 Scope
        </span>
      </motion.div>

      <motion.div
        initial={{ opacity: 0, y: 24 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
        className="bg-white border rounded-2xl p-6 sm:p-8 lg:p-10 shadow-sm"
        style={{ borderColor: C.border }}>
        <h3 className="font-display font-bold text-xl sm:text-2xl mb-4" style={{ color: C.heading }}>
          Multidisciplinary Research &amp; Innovation Domains
        </h3>
        <p className="text-sm leading-relaxed mb-6 max-w-4xl" style={{ color: C.body }}>
          SANKALP-2027 provides a multidisciplinary platform covering emerging trends, scientific breakthroughs, and industrial innovations in sustainability-focused engineering and technology domains. The conference welcomes original research contributions, case studies, industrial applications, and innovative practices related to:
        </p>

        {/* 10 Scopes Grid — 2 balanced responsive columns matching the site's layout tokens */}
        <div className="grid md:grid-cols-2 gap-3.5 mb-6">
          {SANKALP_SCOPES.map((bullet, i) => (
            <motion.div key={i} whileHover={{ x: 3 }}
              className="flex items-center gap-3.5 p-3.5 rounded-xl border transition-all"
              style={{ background: C.bgLight, borderColor: C.border }}>
              <div className="w-6 h-6 rounded-full flex items-center justify-center shrink-0"
                style={{ background: 'rgba(18,124,111,0.14)', color: C.primary700 }}>
                <Icon.Check />
              </div>
              <span className="text-sm font-medium leading-relaxed" style={{ color: C.heading }}>{bullet}</span>
            </motion.div>
          ))}
        </div>

        {/* Concluding callout banner */}
        <div className="p-5 rounded-xl border flex items-start gap-3.5"
          style={{ background: 'rgba(18,124,111,0.05)', borderColor: 'rgba(18,124,111,0.18)' }}>
          <div className="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
            style={{ background: 'rgba(18,124,111,0.15)', color: C.primary700 }}>
            <span className="text-sm">🌍</span>
          </div>
          <p className="text-sm leading-relaxed" style={{ color: C.body }}>
            The conference encourages interdisciplinary contributions that bridge engineering, technology, environmental sciences, data science, policy, and industrial practices to accelerate sustainable development worldwide.
          </p>
        </div>
      </motion.div>
    </div>
  );
}

// ─── Conference Objectives Section ────────────────────────────────────────────
function ConferenceObjectivesSection() {
  return (
    <motion.div
      initial={{ opacity: 0, y: 24 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
      className="rounded-2xl p-8 mb-14 relative overflow-hidden"
      style={{ background: `linear-gradient(150deg, ${C.primary700} 0%, ${C.primary900} 100%)` }}>

      <div className="absolute -right-12 -bottom-12 w-48 h-48 rounded-full pointer-events-none"
        style={{ background: 'rgba(255,255,255,0.06)', filter: 'blur(40px)' }} />

      <div className="relative z-10">
        <div className="flex items-center gap-3 mb-7">
          <div className="w-1 h-5 rounded-full shrink-0 bg-white/40"></div>
          <span className="font-mono text-[11px] uppercase tracking-widest font-bold text-white/70">
            Conference Objectives
          </span>
        </div>

        <div className="grid sm:grid-cols-2 gap-4">
          {OBJECTIVES.map((obj, i) => (
            <motion.div key={i}
              initial={{ opacity: 0, x: -15 }} whileInView={{ opacity: 1, x: 0 }} viewport={{ once: true }}
              transition={{ delay: i * 0.08 }}
              className="flex items-start gap-3">
              <div className="w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5"
                style={{ background: 'rgba(242,183,5,0.18)', border: `1px solid rgba(242,183,5,0.35)` }}>
                <svg className="w-3.5 h-3.5" fill="none" stroke={C.amber} strokeWidth="2.5"
                  strokeLinecap="round" strokeLinejoin="round" viewBox="0 0 24 24">
                  <polyline points="20 6 9 17 4 12" />
                </svg>
              </div>
              <p className="text-sm leading-relaxed text-white/85">{obj}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </motion.div>
  );
}

// ─── About Host Institution Section ──────────────────────────────────────────
function AboutHostInstitutionSection() {
  return (
    <motion.div
      initial={{ opacity: 0, y: 24 }} whileInView={{ opacity: 1, y: 0 }} viewport={{ once: true }}
      className="rounded-2xl overflow-hidden grid lg:grid-cols-12 border shadow-sm"
      style={{ borderColor: C.border }}>

      {/* Left — dark teal content panel */}
      <div className="lg:col-span-7 p-6 sm:p-8 lg:p-10 relative overflow-hidden text-white flex flex-col justify-center"
        style={{ background: `linear-gradient(150deg, ${C.primary900} 0%, #073533 100%)` }}>

        <div className="absolute -left-10 -top-10 w-40 h-40 rounded-full pointer-events-none"
          style={{ background: 'rgba(18,124,111,0.2)', filter: 'blur(60px)' }} />

        <div className="relative z-10 space-y-4">
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 rounded-full flex items-center justify-center shrink-0"
              style={{ background: 'rgba(255,255,255,0.12)', color: '#fff' }}>
              <Icon.Building />
            </div>
            <div>
              <span className="font-mono text-[10px] uppercase tracking-widest text-white/50">Host Institution</span>
              <h3 className="font-display font-bold text-lg text-white leading-tight">
                School of Engineering &amp; Technology<br />
                <span className="text-sm font-normal text-white/80">MGM University, Chhatrapati Sambhajinagar</span>
              </h3>
            </div>
          </div>

          <blockquote className="italic text-sm text-white/70 border-l-2 pl-4"
            style={{ borderColor: C.amber }}>
            "In a gentle way, you can shake the world."
          </blockquote>

          {/* About School of Engineering & Technology (SOET) */}
          <div>
            <h4 className="font-semibold text-xs uppercase tracking-wider text-amber-300/90 mb-1">
              About the Organizing Institution (SOET)
            </h4>
            <p className="text-sm leading-relaxed text-white/85">
              The School of Engineering and Technology (SOET), MGM University, is a multidisciplinary engineering institution dedicated to excellence in education, research, innovation, and industry engagement. The School offers undergraduate, and Diploma programs in emerging areas of engineering and technology and actively promotes interdisciplinary research addressing contemporary industrial and societal challenges.
            </p>
          </div>

          {/* About MGM University */}
          <div>
            <h4 className="font-semibold text-xs uppercase tracking-wider text-amber-300/90 mb-1">
              About MGM University
            </h4>
            <p className="text-sm leading-relaxed text-white/85">
              MGM University, located in Chhatrapati Sambhajinagar (Aurangabad), Maharashtra, is a State Private University established under the MGM University Act, 2019. The University is promoted by the Mahatma Gandhi Mission Trust, a renowned educational organization with a legacy of over four decades in education, healthcare, research, and social development.
            </p>
          </div>

          {/* Sustainable Development & Ecosystem */}
          <div className="rounded-xl px-4 py-3"
            style={{ background: 'rgba(242,183,5,0.10)', border: '1px solid rgba(242,183,5,0.25)' }}>
            <p className="text-sm leading-relaxed text-white/90">
              The University emphasizes innovation-driven education, research excellence, entrepreneurship, industry collaboration, and sustainable development. Through its academic ecosystem, modern laboratories, research centers, incubation facilities, and international collaborations, MGM University is committed to contributing towards national priorities and global sustainable development goals.
            </p>
          </div>
        </div>
      </div>

      {/* Right — MGM University artwork & logo, seamlessly filling the entire box */}
      <div className="lg:col-span-5 relative overflow-hidden min-h-[350px] lg:min-h-full bg-[#20181B]">
        <img
          src="/mgm_university.png"
          alt="MGM University Logo & Campus Artwork"
          className="w-full h-full object-cover object-center block"
        />
      </div>
    </motion.div>
  );
}

// ─── Globe Visual ─────────────────────────────────────────────────────────────
function GlobeVisual() {

  return (
    <div className="relative w-64 h-64 md:w-72 md:h-72 flex items-center justify-center">
      <motion.div animate={{ opacity: [0.1, 0.22, 0.1], scale: [0.95, 1.05, 0.95] }}
        transition={{ duration: 6, repeat: Infinity, ease: 'easeInOut' }}
        className="absolute inset-0 rounded-full"
        style={{ background: 'rgba(18,124,111,0.2)', filter: 'blur(60px)' }} />

      <motion.div animate={{ rotate: -360 }} transition={{ duration: 50, repeat: Infinity, ease: 'linear' }}
        className="absolute w-full h-full rounded-full border border-dashed border-white/15" />

      <motion.svg animate={{ rotate: 360 }} transition={{ duration: 38, repeat: Infinity, ease: 'linear' }}
        className="absolute w-[88%] h-[88%] text-white/25" viewBox="0 0 200 200" fill="none" stroke="currentColor">
        <circle cx="100" cy="100" r="88" strokeWidth="0.8" strokeDasharray="4 4" />
        <ellipse cx="100" cy="100" rx="88" ry="32" strokeWidth="0.7" />
        <ellipse cx="100" cy="100" rx="88" ry="62" strokeWidth="0.7" />
        <ellipse cx="100" cy="100" rx="32" ry="88" strokeWidth="0.7" />
        <ellipse cx="100" cy="100" rx="62" ry="88" strokeWidth="0.7" />
        <line x1="12" y1="100" x2="188" y2="100" strokeWidth="0.7" />
        <line x1="100" y1="12" x2="100" y2="188" strokeWidth="0.7" />
        <circle cx="100" cy="12" r="2.5" fill="#F2B705" />
        <circle cx="100" cy="188" r="2.5" fill="#127C6F" />
        <circle cx="12" cy="100" r="2.5" fill="#127C6F" />
        <circle cx="188" cy="100" r="2.5" fill="#127C6F" />
        <circle cx="100" cy="100" r="3.5" fill="#F2B705" />
        <circle cx="138" cy="62" r="2" fill="#127C6F" />
        <circle cx="62" cy="138" r="2" fill="#127C6F" />
      </motion.svg>

      {/* Floating tech tags */}
      {[
        { text: 'IoT', top: '14%', right: '6%', delay: 0, color: '#10B981' },
        { text: 'Cloud', bottom: '22%', left: '2%', delay: 1.2, color: '#38BDF8' },
        { text: 'Cybersecurity', top: '38%', left: '5%', delay: 0.6, color: '#F2B705' },
      ].map((tag, i) => (
        <motion.div key={i}
          animate={{ y: [i % 2 === 0 ? -7 : 7, i % 2 === 0 ? 7 : -7, i % 2 === 0 ? -7 : 7] }}
          transition={{ duration: 4 + i, repeat: Infinity, ease: 'easeInOut', delay: tag.delay }}
          className="absolute flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-semibold text-white backdrop-blur-md"
          style={{
            ...{ top: tag.top, right: tag.right, bottom: tag.bottom, left: tag.left } as React.CSSProperties,
            background: 'rgba(255,255,255,0.12)', border: '1px solid rgba(255,255,255,0.2)'
          }}>
          <span className="w-1.5 h-1.5 rounded-full" style={{ background: tag.color }}></span>
          {tag.text}
        </motion.div>
      ))}
    </div>
  );
}

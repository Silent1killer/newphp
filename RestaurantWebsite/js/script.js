/**
 * The Desires Restaurant - Main JavaScript
 * Author: [Your Name]
 * Version: 1.0
 */
const data = require('vercel.json');
console.log(data);


document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    }

    // Gallery filter (for gallery.php)
    const filterButtons = document.querySelectorAll('.filter-tabs .nav-link');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (filterButtons.length && galleryItems.length) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                
                // Show/hide gallery items based on filter
                galleryItems.forEach(item => {
                    if (filterValue === '*') {
                        item.style.display = 'block';
                    } else if (item.classList.contains(filterValue.substring(1))) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // Form validation for contact form (contact.php)
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            let isValid = true;
            
            // Get form fields
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const message = document.getElementById('message');
            
            // Validate name
            if (name.value.trim() === '') {
                setInvalidState(name, 'Please enter your name');
                isValid = false;
            } else {
                setValidState(name);
            }
            
            // Validate email
            if (email.value.trim() === '') {
                setInvalidState(email, 'Please enter your email');
                isValid = false;
            } else if (!isValidEmail(email.value.trim())) {
                setInvalidState(email, 'Please enter a valid email address');
                isValid = false;
            } else {
                setValidState(email);
            }
            
            // Validate message
            if (message.value.trim() === '') {
                setInvalidState(message, 'Please enter your message');
                isValid = false;
            } else {
                setValidState(message);
            }
            
            if (!isValid) {
                event.preventDefault();
            }
        });
    }

    // Form validation for reservation form (reservation.php)
    const reservationForm = document.getElementById('reservationForm');
    
    if (reservationForm) {
        reservationForm.addEventListener('submit', function(event) {
            let isValid = true;
            
            // Get form fields
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const date = document.getElementById('date');
            const time = document.getElementById('time');
            const guests = document.getElementById('guests');
            
            // Validate name
            if (name.value.trim() === '') {
                setInvalidState(name, 'Please enter your name');
                isValid = false;
            } else {
                setValidState(name);
            }
            
            // Validate email
            if (email.value.trim() === '') {
                setInvalidState(email, 'Please enter your email');
                isValid = false;
            } else if (!isValidEmail(email.value.trim())) {
                setInvalidState(email, 'Please enter a valid email address');
                isValid = false;
            } else {
                setValidState(email);
            }
            
            // Validate phone
            if (phone.value.trim() === '') {
                setInvalidState(phone, 'Please enter your phone number');
                isValid = false;
            } else {
                setValidState(phone);
            }
            
            // Validate date
            if (date.value.trim() === '') {
                setInvalidState(date, 'Please select a date');
                isValid = false;
            } else {
                const selectedDate = new Date(date.value);
                const currentDate = new Date();
                currentDate.setHours(0, 0, 0, 0);
                
                if (selectedDate < currentDate) {
                    setInvalidState(date, 'Please select a future date');
                    isValid = false;
                } else {
                    setValidState(date);
                }
            }
            
            // Validate time
            if (time.value.trim() === '') {
                setInvalidState(time, 'Please select a time');
                isValid = false;
            } else {
                setValidState(time);
            }
            
            // Validate guests
            if (guests.value.trim() === '') {
                setInvalidState(guests, 'Please select number of guests');
                isValid = false;
            } else {
                setValidState(guests);
            }
            
            if (!isValid) {
                event.preventDefault();
            }
        });
    }

    // Utility function for setting invalid state on form fields
    function setInvalidState(element, message) {
        element.classList.add('is-invalid');
        element.classList.remove('is-valid');
        
        const feedbackElement = element.nextElementSibling;
        if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
            feedbackElement.textContent = message;
        }
    }

    // Utility function for setting valid state on form fields
    function setValidState(element) {
        element.classList.remove('is-invalid');
        element.classList.add('is-valid');
    }

    // Utility function for email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80, // Adjust for navbar height
                    behavior: 'smooth'
                });
            }
        });
    });

    // Bootstrap tooltips initialization
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

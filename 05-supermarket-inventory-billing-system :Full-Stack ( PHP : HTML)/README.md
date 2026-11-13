# Supermarket Inventory & Billing Management System

## Overview
A modular web-based Enterprise Resource Planning (ERP) and Point-of-Sale (POS) application built in **PHP** and **HTML** to manage retail operations, inventory batches, supplier chains, and customer invoicing[cite: 72].

## System Architecture & Modules
The application follows a modular CRUD (Create, Read, Update, Delete) architecture organized by business domain[cite: 72]:

- **Billing & POS (`facturar/`):** Invoice creation (`factura.php`), itemized line-item processing (`detallefactura.php`), and checkout finalization (`finalizarfactura.php`)[cite: 72].
- **Product & Batch Control (`productos/`, `lotes/`):** Catalog management (`agregar_producto.php`, `actualizar_producto.php`) and expiration/stock batch tracking (`lotes.html`, `consultar_lote.php`)[cite: 72].
- **Supply Chain & CRM (`proveedores/`, `clientes/`):** Vendor registration and lookup alongside customer profile management[cite: 72].
- **Staff & Categorization (`vendedor/`, `categorias/`):** Sales representative tracking and hierarchical product categorization[cite: 72].

## Security & Code Review Perspective
Building this full-stack application provided foundational insight into server-side state management, form handling, and relational database interactions—serving as a practical baseline for subsequent **Static Application Security Testing (SAST)** and secure coding reviews (such as preventing SQL Injection via prepared statements and enforcing input sanitization).
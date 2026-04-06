---
name: stitch-design-taste
description: "Semantic Design System Skill for Google Stitch. Generates agent-friendly DESIGN.md files that enforce premium, anti-generic UI standards — strict typography, calibrated color, asymmetric layouts, perpetual micro-motion, and hardware-accelerated performance."
risk: safe
source: community
date_added: "2026-04-06"
---

# Stitch Skill — Semantic Design System for Google Stitch

## Overview

This skill generates `DESIGN.md` files optimized for Google Stitch screen generation, translating anti-slop frontend engineering directives into semantic design language that AI agents can interpret to produce premium interfaces.

---

## 1. Visual Theme & Atmosphere

Evaluate projects across three dimensions:

- **Density:** 1–3 (Art Gallery Airy) → 4–7 (Daily App Balanced) → 8–10 (Cockpit Dense)
- **Variance:** 1–3 (Predictable Symmetric) → 4–7 (Offset Asymmetric) → 8–10 (Artsy Chaotic)
- **Motion:** 1–3 (Static Restrained) → 4–7 (Fluid CSS) → 8–10 (Cinematic Choreography)

**Default baseline:** Variance 8, Motion 6, Density 4 — adapt based on project intent.

---

## 2. Color Palette & Roles

- Maximum 1 accent color; saturation below 80%
- **BANNED:** "AI Purple/Blue Neon" aesthetic, purple button glows, neon gradients
- **BANNED:** pure black (`#000000`) — use Off-Black, Zinc-950, or Charcoal
- Use absolute neutral bases (Zinc/Slate) with single accent
- No warm/cool gray fluctuation across palette

---

## 3. Typography Rules

- **BANNED:** Inter font in premium/creative contexts
- Required distinctive alternatives: Geist, Outfit, Cabinet Grotesk, Satoshi
- **BANNED:** Generic serifs (Times New Roman, Georgia, Garamond, Palatino)
- Acceptable serifs only: Fraunces, Gambarino, Editorial New, Instrument Serif
- **BANNED:** Serif in dashboards or software UIs
- Body text: relaxed leading, max 65 characters per line
- High-density (>7): all numbers must use Monospace
- Dashboard constraint: Sans-Serif pairings only

---

## 4. Hero Section

- **Inline Image Typography:** embed small photos between words at type-height, rounded
- **BANNED:** text overlapping images or other text
- **BANNED:** filler text ("Scroll to explore", "Swipe down", scroll arrows, bouncing chevrons)
- **BANNED:** centered Hero layouts when variance exceeds 4
- Maximum one primary CTA; no secondary "Learn more" links
- Required: asymmetric structure for high-variance projects

---

## 5. Component Stylings

**Buttons:**
- Tactile push feedback on active state
- **BANNED:** neon outer glows, custom mouse cursors

**Cards:**
- Use only when elevation communicates hierarchy
- Tint shadows to background hue
- High-density layouts: replace cards with `border-top` dividers or negative space

**Inputs/Forms:**
- Label above, helper text optional, error text below; standard gap spacing

**Loading:**
- Skeletal loaders matching layout dimensions
- **BANNED:** generic circular spinners

**Empty States:**
- Composed compositions indicating data population

**Error States:**
- Clear, inline error reporting

---

## 6. Layout Principles

- **BANNED:** overlapping elements — every element occupies clean spatial zone
- **BANNED:** absolute-positioned content stacking
- **BANNED:** centered Hero sections when variance exceeds 4 — force Split Screen, Left-Aligned, or Asymmetric Whitespace
- **BANNED:** generic "3 equal cards horizontally" feature row — use 2-column Zig-Zag, asymmetric grid, or horizontal scroll
- CSS Grid over Flexbox; **BANNED:** `calc()` percentage hacks
- Max-width containment (e.g., 1400px centered)
- **BANNED:** `h-screen` — use `min-h-[100dvh]` (iOS Safari compatibility)

---

## 7. Responsive Rules

- Mobile-first collapse below 768px: all multi-column layouts → single column
- **BANNED:** horizontal scroll on mobile (critical failure)
- Typography: headlines via `clamp()`; body text minimum 1rem/14px
- Touch targets: all interactive elements minimum 44px
- Inline typography images: stack below headline on mobile
- Vertical section gaps: `clamp(3rem, 8vw, 6rem)`

---

## 8. Motion Philosophy

- Spring Physics default: stiffness 100, damping 20
- Perpetual Micro-Interactions: infinite loop states (Pulse, Typewriter, Float, Shimmer)
- Staggered Orchestration: cascade delays for waterfall reveals
- **BANNED:** animating `top`, `left`, `width`, `height` — use `transform` and `opacity` only
- Grain/noise filters on fixed pseudo-elements only

---

## 9. Anti-Patterns (Explicit Bans)

- No emojis
- No Inter font
- No generic serif fonts
- No pure black (`#000000`)
- No neon/outer glow shadows
- No oversaturated accents
- No excessive gradient text on large headers
- No custom mouse cursors
- No overlapping elements
- No 3-column equal card layouts
- No generic names ("John Doe", "Acme", "Nexus")
- No fake round numbers (99.99%, 50%)
- No AI copywriting clichés ("Elevate", "Seamless", "Unleash", "Next-Gen")
- No filler UI text or scroll indicators
- No broken Unsplash links — use `picsum.photos` or SVG avatars
- No centered Hero sections (high-variance projects)

## When to Use
Use this skill to generate DESIGN.md files for Google Stitch projects, or to establish semantic design system constraints that enforce premium, anti-generic UI standards for any AI-assisted UI generation.

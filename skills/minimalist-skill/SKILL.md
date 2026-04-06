---
name: minimalist-ui
description: "Clean editorial-style interfaces. Warm monochrome palette, typographic contrast, flat bento grids, muted pastels. No gradients, no heavy shadows."
risk: safe
source: community
date_added: "2026-04-06"
---

# Minimalist Skill — Premium Utilitarian UI

## Overview

Protocol for advanced frontend directive for refined, ultra-minimalist, document-style web interfaces. Enforces warm monochromatic color system with strategic pastel accents, bespoke typographic hierarchies, and flat component architecture.

---

## 1. Absolute Negative Constraints (Banned Elements)

**Typefaces banned:** Inter, Roboto, Open Sans

**Icon libraries banned:** Lucide, Feather, standard Heroicons

**Shadow restrictions:** No Tailwind defaults (`shadow-md`, `shadow-lg`, `shadow-xl`); custom shadows must be ultra-diffuse, opacity < 0.05

**Color bans:** No primary colored backgrounds for large sections, gradients, neon colors, 3D glassmorphism

**Shape bans:** No `rounded-full` for large containers, cards, primary buttons

**Content bans:** No emojis anywhere in code/markup/text/headings/alt text

**Naming bans:** No generic placeholders (John Doe, Acme Corp, Lorem Ipsum)

**Copywriting bans:** No clichés ("Elevate", "Seamless", "Unleash", "Next-Gen", "Game-changer", "Delve")

---

## 2. Typographic Architecture

**Primary Sans-Serif (body, UI, buttons):** SF Pro Display, Geist Sans, Helvetica Neue, Switzer

**Editorial Serif (hero headings, quotes):** Lyon Text, Newsreader, Playfair Display, Instrument Serif
- letter-spacing: -0.02em to -0.04em
- line-height: 1.1

**Monospace (code, keystrokes, metadata):** Geist Mono, SF Mono, JetBrains Mono

**Text colors:**
- Body text must never be `#000000`; use `#111111` or `#2F3437` with line-height: 1.6
- Secondary text: `#787774`

---

## 3. Color Palette (Warm Monochrome + Spot Pastels)

**Canvas/background:** `#FFFFFF` or warm bone `#F7F6F3` / `#FBFBFA`

**Primary surface (cards):** `#FFFFFF` or `#F9F9F8`

**Borders/dividers:** `#EAEAEA` or `rgba(0,0,0,0.06)`

**Muted pastels:**
- Pale Red: `#FDEBEC` (text: `#9F2F2D`)
- Pale Blue: `#E1F3FE` (text: `#1F6C9F`)
- Pale Green: `#EDF3EC` (text: `#346538`)
- Pale Yellow: `#FBF3DB` (text: `#956400`)

---

## 4. Component Specifications

**Bento boxes:** Asymmetrical CSS Grid; `border: 1px solid #EAEAEA`; `border-radius: 8px–12px max`; `padding: 24px–40px`

**Primary CTA buttons:** Background `#111111`, text `#FFFFFF`; `border-radius: 4–6px`; no `box-shadow`; hover: shift to `#333333` or `scale(0.98)`

**Tags/badges:** `border-radius: 9999px`; `text-xs`; uppercase; `letter-spacing: 0.05em`; use muted pastels

**Accordions:** No container boxes; items separated by `border-bottom: 1px solid #EAEAEA`; clean +/− toggle icons

**Keystroke micro-UIs:** `<kbd>` tags with `border: 1px solid #EAEAEA`; `border-radius: 4px`; `background: #F7F6F3`; monospace font

**Faux-OS window chrome:** Minimalist white top bar with three small light gray circles (macOS-style controls)

---

## 5. Iconography & Imagery Directives

**System icons:** Phosphor Icons (Bold or Fill) or Radix UI Icons; consistent stroke width

**Illustrations:** Monochromatic continuous-line ink sketches; single offset geometric shape in muted pastel

**Photography:** High-quality, desaturated, warm tone; overlay opacity: 0.04 warm grain; no oversaturated stock; placeholder: `https://picsum.photos/seed/{context}/1200/800`

**Hero/section backgrounds:** Subtle full-width imagery at low opacity; soft radial light spots (opacity: 0.03); minimal geometric line patterns

---

## 6. Subtle Motion & Micro-Animations

**Scroll entry:** Fade-in via `translateY(12px) + opacity: 0` over 600ms, easing `cubic-bezier(0.16, 1, 0.3, 1)`; use `IntersectionObserver`, never window scroll listener

**Hover states:** Cards lift with shadow `0 0 0 → 0 2px 8px rgba(0,0,0,0.04)` over 200ms; buttons: `scale(0.98)` on `:active`

**Staggered reveals:** Lists/grids cascade with `animation-delay: calc(var(--index) * 80ms)`

**Ambient motion:** Optional single slow radial gradient blob (20s+ duration, opacity: 0.02–0.04); `position: fixed`; `pointer-events: none`

**Performance:** Animate only via `transform` and `opacity`; no layout-triggering properties; use `will-change: transform` sparingly

---

## 7. Execution Protocol

1. Establish macro-whitespace first; vertical padding `py-24` or `py-32`
2. Constrain content width to `max-w-4xl` or `max-w-5xl`
3. Apply custom typographic hierarchy and monochromatic color variables immediately
4. Every card/divider/border: `1px solid #EAEAEA`
5. Add scroll-entry animations to major content blocks
6. Sections need visual depth via imagery, ambient gradients, or subtle textures — no empty flat backgrounds
7. Code reflects high-end, uncluttered, editorial aesthetic natively

## When to Use
Use this skill when building clean, editorial-style interfaces such as documentation sites, portfolios, SaaS dashboards, or any UI requiring premium minimalism with typographic contrast.

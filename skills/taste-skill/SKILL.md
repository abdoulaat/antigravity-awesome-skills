---
name: design-taste-frontend
description: "Senior UI/UX Engineer skill. Architect digital interfaces overriding default LLM biases. Enforces metric-based rules, strict component architecture, CSS hardware acceleration, and balanced design engineering."
risk: safe
source: community
date_added: "2026-04-06"
---

# Design Taste — Frontend

## 1. ACTIVE BASELINE CONFIGURATION

- **DESIGN_VARIANCE:** 8 (scale: 1=Perfect Symmetry to 10=Artsy Chaos)
- **MOTION_INTENSITY:** 6 (scale: 1=Static/No movement to 10=Cinematic/Magic Physics)
- **VISUAL_DENSITY:** 4 (scale: 1=Art Gallery/Airy to 10=Pilot Cockpit/Packed Data)
- User requests override baseline values dynamically

---

## 2. DEFAULT ARCHITECTURE & CONVENTIONS

- **Dependency verification mandatory** before importing third-party libraries
- Framework: React or Next.js; default to Server Components (RSC)
- RSC safety: global state only in Client Components
- Interactivity isolation: interactive UI components extracted as isolated `'use client'` leaves
- State management: `useState`/`useReducer` for isolated UI; global state for deep prop-drilling avoidance
- Styling: Tailwind CSS v3/v4 (90% of styling)
- **Tailwind version lock:** check `package.json` first; no v4 syntax in v3 projects
- **Anti-emoji policy [CRITICAL]:** replace emojis with Radix, Phosphor icons, or SVG primitives
- Breakpoints standardized: `sm`, `md`, `lg`, `xl`
- Page layouts: `max-w-[1400px] mx-auto` or `max-w-7xl`
- **Viewport stability [CRITICAL]:** use `min-h-[100dvh]` instead of `h-screen` to prevent mobile layout jumping
- **Grid over flex-math:** use CSS Grid (`grid grid-cols-1 md:grid-cols-3 gap-6`) instead of complex flexbox percentages
- Icons: use `@phosphor-icons/react` or `@radix-ui/react-icons`; standardize `strokeWidth` globally (e.g., `1.5` or `2.0`)

---

## 3. DESIGN ENGINEERING DIRECTIVES (Bias Correction)

### Rule 1: Deterministic Typography
- Display/Headlines: `text-4xl md:text-6xl tracking-tighter leading-none`
- **Anti-slop:** discourage Inter for "Premium" vibes; use Geist, Outfit, Cabinet Grotesk, or Satoshi
- **Technical UI rule:** serif fonts strictly BANNED for Dashboard/Software UIs
- Body/Paragraphs: `text-base text-gray-600 leading-relaxed max-w-[65ch]`

### Rule 2: Color Calibration
- Max 1 accent color; saturation < 80%
- **Lila ban:** "AI Purple/Blue" aesthetic strictly BANNED; no purple button glows or neon gradients
- Use neutral bases (Zinc/Slate) with high-contrast singular accents (Emerald, Electric Blue, Deep Rose)
- Color consistency: maintain one palette throughout entire output

### Rule 3: Layout Diversification
- **Anti-center bias:** centered Hero/H1 sections BANNED when `LAYOUT_VARIANCE > 4`
- Force "Split Screen" (50/50), "Left Aligned content/Right Aligned asset", or "Asymmetric White-space"

### Rule 4: Materiality, Shadows, "Anti-Card Overuse"
- **Dashboard hardening:** for `VISUAL_DENSITY > 7`, generic card containers BANNED
- Use logic-grouping via `border-t`, `divide-y`, or negative space
- Data metrics should breathe without boxing unless elevation (z-index) is functionally required
- Use cards ONLY when elevation communicates hierarchy
- When shadows used, tint to background hue

### Rule 5: Interactive UI States
- **Mandatory generation:** implement full interaction cycles:
  - Loading: skeletal loaders matching layout sizes
  - Empty states: beautifully composed empty state indicators
  - Error states: clear, inline error reporting (e.g., forms)
  - Tactile feedback: on `:active`, use `-translate-y-[1px]` or `scale-[0.98]` to simulate physical push

### Rule 6: Data & Form Patterns
- Forms: label sits above input; helper text optional but should exist in markup
- Error text below input; standard `gap-2` for input blocks

---

## 4. CREATIVE PROACTIVITY (Anti-Slop Implementation)

- **"Liquid Glass" Refraction:** add 1px inner border (`border-white/10`) and subtle inner shadow (`shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]`) to simulate physical edge refraction
- **Magnetic Micro-physics** (if `MOTION_INTENSITY > 5`): buttons pull slightly toward mouse cursor; use Framer Motion `useMotionValue` and `useTransform` exclusively (NOT `useState`)
- **Perpetual Micro-Interactions** (when `MOTION_INTENSITY > 5`): embed infinite animations (Pulse, Typewriter, Float, Shimmer, Carousel) in standard components
- Apply premium Spring Physics: `type: "spring", stiffness: 100, damping: 20` to all interactive elements (no linear easing)
- **Layout Transitions:** use Framer Motion `layout` and `layoutId` props for smooth re-ordering, resizing, shared element transitions
- **Staggered Orchestration:** use `staggerChildren` or CSS cascade (`animation-delay: calc(var(--index) * 100ms)`) for sequential waterfall reveals
- **CRITICAL:** Parent and children with `staggerChildren` MUST reside in identical Client Component tree; pass async data as props into centralized Parent Motion wrapper

---

## 5. PERFORMANCE GUARDRAILS

- Apply grain/noise filters exclusively to fixed, `pointer-events-none` pseudo-elements
- NEVER apply to scrolling containers (prevents continuous GPU repaints on mobile)
- **Hardware acceleration:** animate exclusively via `transform` and `opacity` (never `top`, `left`, `width`, `height`)
- **Z-Index restraint:** use strictly for systemic layer contexts (Sticky Navbars, Modals, Overlays); NEVER spam arbitrary `z-50` or `z-10`

---

## 6. TECHNICAL REFERENCE (Dial Definitions)

### DESIGN_VARIANCE (Level 1–10)
- **1–3 (Predictable):** Flexbox `justify-center`, strict 12-column symmetrical grids, equal paddings
- **4–7 (Offset):** `margin-top: -2rem` overlapping, varied image aspect ratios (4:3 next to 16:9), left-aligned headers over center-aligned data
- **8–10 (Asymmetric):** Masonry layouts, CSS Grid with fractional units (e.g., `grid-template-columns: 2fr 1fr 1fr`), massive empty zones (e.g., `padding-left: 20vw`)
- **Mobile override:** levels 4–10 fall back aggressively to single-column (`w-full`, `px-4`, `py-8`) on viewports `< 768px`

### MOTION_INTENSITY (Level 1–10)
- **1–3 (Static):** no automatic animations; CSS `:hover` and `:active` states only
- **4–7 (Fluid CSS):** use `transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1)`; `animation-delay` cascades for load-ins; focus on `transform` and `opacity`; use `will-change: transform` sparingly
- **8–10 (Advanced Choreography):** complex scroll-triggered reveals or parallax; use Framer Motion hooks; NEVER use `window.addEventListener('scroll')`

### VISUAL_DENSITY (Level 1–10)
- **1–3 (Art Gallery Mode):** lots of white space; huge section gaps; everything feels expensive and clean
- **4–7 (Daily App Mode):** normal spacing for standard web apps
- **8–10 (Cockpit Mode):** tiny paddings; no card boxes (just 1px lines to separate data); everything packed
- **Mandatory for Cockpit:** use Monospace (`font-mono`) for all numbers

---

## 7. AI TELLS (Forbidden Patterns)

### Visual & CSS
- **NO Neon/Outer Glows:** no default `box-shadow` glows or auto-glows; use inner borders or subtle tinted shadows
- **NO Pure Black:** never use `#000000`; use Off-Black, Zinc-950, or Charcoal
- **NO Oversaturated Accents:** desaturate accents
- **NO Excessive Gradient Text:** no text-fill gradients for large headers
- **NO Custom Mouse Cursors:** outdated; ruins performance/accessibility

### Typography
- **NO Inter Font:** BANNED; use Geist, Outfit, Cabinet Grotesk, or Satoshi
- **NO Oversized H1s:** control hierarchy with weight and color, not massive scale
- **Serif constraints:** use Serif ONLY for creative/editorial designs; NEVER use Serif on clean Dashboards

### Layout & Spacing
- Align and space perfectly; avoid floating elements with awkward gaps
- **NO 3-Column Card Layouts:** BANNED; use 2-column Zig-Zag, asymmetric grid, or horizontal scrolling instead

### Content & Data (The "Jane Doe" Effect)
- **NO Generic Names:** "John Doe", "Sarah Chan", "Jack Su" BANNED; use highly creative, realistic-sounding names
- **NO Generic Avatars:** DO NOT use standard SVG "egg" or Lucide user icons; use creative, believable photo placeholders or specific styling
- **NO Fake Numbers:** avoid predictable outputs like `99.99%`, `50%`, or basic phone numbers (`1234567`); use organic, messy data (`47.2%`, `+1 (312) 847-1928`)
- **NO Startup Slop Names:** "Acme", "Nexus", "SmartFlow" BANNED; invent premium, contextual brand names
- **NO Filler Words:** avoid AI copywriting clichés like "Elevate", "Seamless", "Unleash", "Next-Gen"; use concrete verbs

### External Resources & Components
- **NO Broken Unsplash Links:** use reliable placeholders like `https://picsum.photos/seed/{random_string}/800/600` or SVG UI Avatars
- **shadcn/ui customization:** customize radii, colors, shadows to match high-end project aesthetic
- **Production-ready cleanliness:** code must be extremely clean, visually striking, memorable, meticulously refined

---

## 8. THE CREATIVE ARSENAL (High-End Inspiration)

**General guidance:** leverage GSAP (ScrollTrigger/Parallax) for complex scrolltelling or ThreeJS/WebGL for 3D/Canvas animations rather than basic CSS motion. CRITICAL: NEVER mix GSAP/ThreeJS with Framer Motion in same component tree. Default to Framer Motion for UI/Bento interactions. Use GSAP/ThreeJS EXCLUSIVELY for isolated full-page scrolltelling or canvas backgrounds, wrapped in strict useEffect cleanup blocks.

### Navigation & Menus
- Mac OS Dock Magnification
- Magnetic Button
- Gooey Menu
- Dynamic Island
- Contextual Radial Menu
- Floating Speed Dial
- Mega Menu Reveal

### Layout & Grids
- Bento Grid (asymmetric, tile-based grouping like Apple Control Center)
- Masonry Layout (staggered grid without fixed row heights)
- Chroma Grid (grid borders showing subtle, continuously animating color gradients)
- Split Screen Scroll (two screen halves sliding in opposite directions)
- Curtain Reveal (Hero section parting like curtain on scroll)

### Cards & Containers
- Parallax Tilt Card (3D-tilting card tracking mouse coordinates)
- Spotlight Border Card (card borders illuminating dynamically under cursor)
- Glassmorphism Panel (frosted glass with inner refraction borders)
- Holographic Foil Card (iridescent, rainbow light reflections on hover)
- Tinder Swipe Stack (physical stack of cards user can swipe away)
- Morphing Modal (button seamlessly expanding into full-screen dialog)

### Scroll Animations
- Sticky Scroll Stack (cards stick to top and physically stack)
- Horizontal Scroll Hijack (vertical scroll translates to smooth horizontal gallery pan)
- Locomotive Scroll Sequence (video/3D sequences tied to scrollbar framerate)
- Zoom Parallax (central background image zooming in/out on scroll)
- Scroll Progress Path (SVG vector lines drawing as user scrolls)
- Liquid Swipe Transition (page transitions wiping screen like viscous liquid)

### Galleries & Media
- Dome Gallery (3D gallery feeling like panoramic dome)
- Coverflow Carousel (3D carousel with center focused, edges angled back)
- Drag-to-Pan Grid (boundless grid freely draggable in any compass direction)
- Accordion Image Slider (narrow strips expanding fully on hover)
- Hover Image Trail (mouse leaves trail of popping/fading images)
- Glitch Effect Image (brief RGB-channel shifting digital distortion on hover)

### Typography & Text
- Kinetic Marquee (endless text bands reversing direction or speeding up on scroll)
- Text Mask Reveal (massive typography as transparent window to video background)
- Text Scramble Effect (Matrix-style character decoding on load or hover)
- Circular Text Path (text curved along spinning circular path)
- Gradient Stroke Animation (outlined text with gradient running along stroke)
- Kinetic Typography Grid (grid of letters dodging or rotating away from cursor)

### Micro-Interactions & Effects
- Particle Explosion Button (CTAs shattering into particles on success)
- Liquid Pull-to-Refresh (mobile reload indicators acting like detaching water droplets)
- Skeleton Shimmer (shifting light reflections across placeholder boxes)
- Directional Hover Aware Button (hover fill entering from exact side mouse entered)
- Ripple Click Effect (visual waves rippling from click coordinates)
- Animated SVG Line Drawing (vectors drawing own contours in real-time)
- Mesh Gradient Background (organic, lava-lamp-like animated color blobs)
- Lens Blur Depth (dynamic focus blurring background UI layers)

---

## 9. THE "MOTION-ENGINE" BENTO PARADIGM

### A. Core Design Philosophy
- Aesthetic: high-end, minimal, functional
- Palette: background `#f9fafb`; cards pure white (`#ffffff`) with 1px border `border-slate-200/50`
- Surfaces: `rounded-[2.5rem]` for all major containers; apply diffusion shadow (e.g., `shadow-[0_20px_40px_-15px_rgba(0,0,0,0.05)]`)
- Typography: strict Geist, Satoshi, or Cabinet Grotesk font stack; subtle tracking (`tracking-tight`) for headers
- Labels: placed **outside and below** cards for clean, gallery-style presentation
- **Pixel-perfection:** generous `p-8` or `p-10` padding inside cards

### B. The Animation Engine Specs (Perpetual Motion)
- **Spring Physics:** use `type: "spring", stiffness: 100, damping: 20` (no linear easing)
- **Layout Transitions:** heavily utilize `layout` and `layoutId` props for smooth re-ordering, resizing, shared element state transitions
- **Infinite Loops:** every card must have "Active State" looping infinitely (Pulse, Typewriter, Float, Carousel) for "alive" dashboard feel
- **Performance:** wrap dynamic lists in `<AnimatePresence>`; optimize for 60fps
- **PERFORMANCE CRITICAL:** perpetual motion/infinite loops MUST be memoized (React.memo) and completely isolated in own microscopic Client Component; never trigger parent re-renders

### C. The 5-Card Archetypes (Micro-Animation Specs)
1. **The Intelligent List:** vertical stack with infinite auto-sorting loop; items swap positions using `layoutId`
2. **The Command Input:** search/AI bar with multi-step Typewriter Effect; cycles through complex prompts with blinking cursor and "processing" state with shimmering loading gradient
3. **The Live Status:** scheduling interface with "breathing" status indicators; pop-up notification badge emerges with "Overshoot" spring effect, stays 3 seconds, vanishes
4. **The Wide Data Stream:** horizontal "Infinite Carousel" of data cards/metrics; seamless loop using `x: ["0%", "-100%"]`
5. **The Contextual UI (Focus Mode):** document view animating staggered highlight of text block, followed by "Float-in" of floating action toolbar with micro-icons

---

## 10. FINAL PRE-FLIGHT CHECK

- [ ] Is global state used appropriately (avoiding deep prop-drilling vs. arbitrary use)?
- [ ] Is mobile layout collapse (`w-full`, `px-4`, `max-w-7xl mx-auto`) guaranteed for high-variance designs?
- [ ] Do full-height sections safely use `min-h-[100dvh]` instead of bugged `h-screen`?
- [ ] Do `useEffect` animations contain strict cleanup functions?
- [ ] Are empty, loading, and error states provided?
- [ ] Are cards omitted in favor of spacing where possible?
- [ ] Did you strictly isolate CPU-heavy perpetual animations in own Client Components?

## When to Use
Use this skill when building or reviewing frontend interfaces to override generic AI design patterns and enforce premium UI/UX standards.

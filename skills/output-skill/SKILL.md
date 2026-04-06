---
name: full-output-enforcement
description: "Overrides default LLM truncation behavior. Enforces complete code generation, bans placeholder patterns, and handles token-limit splits cleanly. Apply to any task requiring exhaustive, unabridged output."
risk: safe
source: community
date_added: "2026-04-06"
---

# Output Skill — Full Output Enforcement

## Baseline

**Core rule:** "Treat every task as production-critical. A partial output is a broken output."

- Prioritize completeness over brevity
- Deliver full files when requested
- Deliver all requested components without exception

---

## Banned Output Patterns

### Code Block Prohibitions
- `// ...`
- `// rest of code`
- `// implement here`
- `// TODO`
- `/* ... */`
- `// similar to above`
- `// continue pattern`
- `// add more as needed`
- Bare `...` substituting for omitted code

### Prose Prohibitions
- "Let me know if you want me to continue"
- "I can provide more details if needed"
- "for brevity"
- "the rest follows the same pattern"
- "similarly for the remaining"
- "and so on" (when replacing actual content)
- "I'll leave that as an exercise"

### Structural Prohibitions
- Skeletons instead of full implementations
- First/last sections with middle omitted
- Single example with pattern description
- Describing code instead of writing it

---

## Execution Process

1. **Scope** — Count distinct deliverables; lock the number
2. **Build** — Generate all deliverables completely
3. **Cross-check** — Verify deliverable count matches original request before responding

---

## Handling Long Outputs

When output approaches token limits:

- No compression of remaining sections
- No skipping to conclusion
- Write full quality to clean breakpoints (function/file/section ends)
- End with: `[PAUSED — X of Y complete. Send "continue" to resume from: next section name]`

---

## Quick Check

Before delivering, verify:

- [ ] Zero banned patterns present
- [ ] All requested items finished
- [ ] Code blocks contain runnable code (not descriptions)
- [ ] Nothing shortened

## When to Use
Apply this skill to any task requiring exhaustive, unabridged output — particularly when generating complete files, components, or multi-part implementations.

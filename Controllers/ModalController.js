export default function initModal(elOrId, cfg = {}, modalType) {
  const {
    openSel = `[data-modal-toggle="${
      typeof elOrId === "string" ? elOrId : elOrId.id
    }"], [data-modal-open="${
      typeof elOrId === "string" ? elOrId : elOrId.id
    }"]`,
    closeSel = `[data-modal-close], [data-modal-hide]`,
    options = {},
    splideSelector = null, // Add splide selector configuration
  } = cfg;

  // Resolve the DOM node
  const modalEl =
    typeof elOrId === "string" ? document.getElementById(elOrId) : elOrId;

  if (!modalEl) {
    console.warn("initModal: modal element not found:", elOrId);
    return null;
  }

  // Make the Flowbite instance
  const modal = new Modal(modalEl, {
    backdrop: `${modalType}`,
    closable: true,
    ...options,
  });

  // Event delegation for dynamic content
  document.body.addEventListener("click", (e) => {
    // Handle open triggers
    if (e.target.closest(openSel)) {
      e.preventDefault();

      // Refresh Splide if configured
      if (splideSelector) {
        const splideElement = document.querySelector(splideSelector);
        if (splideElement && splideElement.splide) {
          // Go back to first page and refresh
          splideElement.splide.go(0);
          splideElement.splide.refresh();
        }
      }

      modal.show();
    }

    // Handle close triggers within the modal
    if (modal.isVisible() && e.target.closest(closeSel)) {
      e.preventDefault();
      modal.hide();
    }
  });

  return modal;
}

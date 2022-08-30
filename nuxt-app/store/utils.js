export const findItemIndex = (items, id) => {
    return items.findIndex(item => item.id === id);
};

export const isItemExists = (items, id) => {
    return items.some(item => item.id == id);
};

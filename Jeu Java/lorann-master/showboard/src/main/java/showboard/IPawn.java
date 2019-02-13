package showboard;

import java.awt.Dimension;
import java.awt.Image;
import java.awt.Point;

/**
 * <h1>The Interface IPawn.</h1>
 * <p>
 * A class can implement the IPawn interface when it wants to move on a IBoard.
 * </p>
 *
 * @author Anne-Emilie DIET
 * @version 1.1
 * @see IBoard
 * @see ISquare
 * @see Point
 */
public interface IPawn extends ISquare {

    /**
     * Gets the x position.
     *
     * @return the x
     */
    int getX();

    /**
     * Gets the y position.
     *
     * @return the y
     */
    int getY();
    
    /**
     * Gets the width.
     *
     * @return the width
     */
    int getWidth();
    
    /**
     * Gets the height.
     *
     * @return the height
     */
    int getHeight();

    /**
     * Gets the number of sprites for this pawn.
     *
     * @return the nbrImages
     */
    int getNbrImages();
    
    /**
     * Gets the position Point(int x, int y).
     *
     * @return the position
     * @see Point
     */
    Point getPosition();
    
    Dimension getDimension();
    
    Image getImage();

	void animate();
}

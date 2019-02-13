package showboard;

import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.image.BufferedImage;
import java.util.ArrayList;
import java.util.List;
import java.util.Observable;
import java.util.Observer;

import javax.swing.JPanel;

/**
 * <h1>The Class BoardPanel.</h1>
 * <p>
 * This class represents the board as an image. It extends JPanel.
 * </p>
 * <p>
 * It uses an ISquare[][] as board, a List&lt;IPawn&gt; as list of pawns.
 * </p>
 * <p>
 * If an ISquare has not an image, the noImage is used.
 * </p>
 * <p>
 * The same noImage is used to illustrate the board's edge.
 * </p>
 * <p>
 * The class implements Observer interface to observe the Observable who stores the board's data. At
 * each update, the image is build.
 * </p>
 * <p>
 * The all image isn't display, just the zone represented by the display Rectangle is show in the
 * panel. If this Rectangle is higher than the board dimension, the noImage is also used.
 * </p>
 *
 * @author Anne-Emilie DIET
 * @version 3.0
 * @see JPanel
 * @see Dimension
 * @see Rectangle
 * @see Image
 * @see ISquare
 * @see IPawn
 * @see Observer
 * @see Observable
 */
/**
 * @author Nolan
 *
 */

class BoardPanel extends JPanel implements Observer {

    /** The Constant serialVersionUID. */
    private static final long   serialVersionUID = -3618605287900763008L;

    /** The squares represents the square of the board. */
    private ISquare[][]         squares;

    /** The pawns represents a list of all the pawns on the board. */
    private final List<IPawn>   pawns;

    /**
     * The dimension is used to known the width and the height of the board. It's used principally
     * with the squares property
     */
    private Dimension           dimension;

    /** The no image is used to factorize the NoImage loading. */
    private final BufferedImage noImage;

    /**
     * Instantiates a new board panel.
     */
    public BoardPanel() {
        super();
        this.pawns = new ArrayList<>();
        this.noImage = new BufferedImage(1, 1, BufferedImage.TYPE_INT_ARGB);
		//final Graphics2D graphics = this.noImage.createGraphics();
    }

    /**
     * Paint component.
     *
     * @param graphics
     *            the graphics
     */
    /*
     * (non-Javadoc)
     * @see javax.swing.JComponent#paintComponent(java.awt.Graphics)
     */
    @Override
    public final void paintComponent(final Graphics graphics) {
    	super.paintComponent(graphics);
    	/*Image imga;
    	try {
			imga = ImageIO.read(new File("../sprites/thibault_mouth.png"));
			graphics.drawImage(imga, 12, 12, 96, 161, this);
		} catch (IOException e1) {
			e1.printStackTrace();
		}*/
    	
    	for (int x = 0; x <= this.getWidth()/32; x++) {
    		for (int y = 0; y <= this.getHeight()/32; y++) {
    			this.drawSquareXY(graphics, x, y);
    			this.drawPawnsXY(graphics);
    		}
    	}
    }

    /*
     * (non-Javadoc)
     * @see java.util.Observer#update(java.util.Observable, java.lang.Object)
     */
    @Override
    public final void update(final Observable observable, final Object object) {
        this.repaint();
    }

    /**
     * Adds the square.
     *
     * @param square
     *            the square
     * @param x
     *            the x
     * @param y
     *            the y
     */
    public final void addSquare(final ISquare square, final int x, final int y) {
        this.squares[x][y] = square;
    }

    /**
     * Adds the pawn.
     *
     * @param pawn
     *            the pawn
     */
    public final void addPawn(final IPawn pawn) {
        this.getPawns().add(pawn);
    }
    public final void addPawns(final List<IPawn> pawns) {
        this.getPawns().addAll(pawns);
    }

    /**
     * Gets the image XY.
     *
     * @param x
     *            the x
     * @param y
     *            the y
     * @param widthLimit
     *            the width limit
     * @param heightLimit
     *            the height limit
     * @return the image XY
     */
    private Image getImageXY(int x, int y, final int widthLimit, final int heightLimit) {
        Image image;
        if ((x < 0) || (y < 0) || (x >= widthLimit) || (y >= heightLimit)) {
            image = this.noImage;
        } else {
            image = this.squares[x][y].getImage();
            if (image == null) {
                image = this.noImage;
            }
        }
        return image;
    }

    /**
     * Gets the pawns.
     *
     * @return the pawns
     */
    private List<IPawn> getPawns() {
        return this.pawns;
    }

    /**
     * Gets the dimension.
     *
     * @return the dimension
     * @see Dimension
     */
    public final Dimension getDimension() {
        return this.dimension;
    }

    /**
     * Sets the dimension.
     *
     * @param dimension
     *            the new dimension
     */
    public final void setDimension(final Dimension dimension) {
        this.dimension = dimension;
        this.squares = new ISquare[(int) this.getDimension().getWidth()][(int) this.getDimension().getHeight()];
    }
    
    /**
     * Gets the squares.
     */
    public ISquare[][] getSquares() {
    	return this.squares;
    }

    /**
     * Draw square XY.
     *
     * @param graphics
     *            the graphics
     * @param x
     *            the x
     * @param y
     *            the y
     */
    private void drawSquareXY(final Graphics graphics, final int x, final int y) {
        Image image;
        image = this.getImageXY(x, y, (int) this.getDimension().getWidth(), (int) this.getDimension().getHeight());
        graphics.drawImage(image, x*32, y*32, 32, 32, this);
    }

    /**
     * Draw pawns XY.
     *
     * @param graphics
     *            the graphics
     * @param mapPawn
     *            the map pawn
     * @param x
     *            the x
     * @param y
     *            the y
     */
    private void drawPawnsXY(final Graphics graphics) {
        for (int i = 0; i < this.getPawns().size(); i++) {    
            graphics.drawImage(this.getPawns().get(i).getImage(), this.getPawns().get(i).getX()*32, this.getPawns().get(i).getY()*32, (int)this.getPawns().get(i).getWidth(), (int)this.getPawns().get(i).getHeight(), this);
        }
    }
}

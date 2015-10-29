class EstablishmentsController < ApplicationController
  # Before these functions can be processed, user token must be authenticated
  before_action :authenticate_with_token!, only: [:index, :show, :update]

  # Function that creates a coffee shop to save to the database 
  def create
    @establishment = Establishment.new(name: params[:name],
                                       street_address: params[:street_address],
                                       city: params[:city],
                                       state: params[:state],
                                       zip_code: params[:zip_code],
                                       coffee_quality: params[:coffee_quality],
                                       wifi: params[:wifi],
                                       price: params[:price],
                                       ambiance: params[:ambiance])
    # If @establishment.save returns true, then API will render json data of the newly created establishment in the database.
    if @establishment.save
      # render json "register.json.jbuilder", status: :created
      render json: { establishment: @establishment.as_json(only: [:id,
                                                                  :name, 
                                                                  :street_address, 
                                                                  :city, 
                                                                  :state,
                                                                  :zip_code,
                                                                  :coffee_quality,
                                                                  :wifi,
                                                                  :price,
                                                                  :ambiance]) },
      status: :created
    else
      # Otherwise, if @establishment.save returns anything other than true, then API will return error messages associated with the request
      render json: { errors: @user.errors.full_messages },
        status: :unprocessable_entity
    end
  end

  def index
    @establishments = Establishment.all
    render 'index.json.jbuilder', status: :ok
  end

  def show 
    @establishment = Establishment.find_by(id: params[:id])
    if @establishment
    # render json "register.json.jbuilder", status: :created
    render json: { establishment: @establishment.as_json(only: [:name, :street_address,
                                                                :city, :state,
                                                                :zip_code, :coffee_quality,
                                                                :ambiance, :price,
                                                                :wifi?]) },
      status: :ok
    end
  end

  def update
    attributes = set_attributes(params)
    @establishment = Establishment.find_by(id: params[:id])
    new_ratings = update_ratings(params, @establishment)
    attributes.merge!(new_ratings)
    if @establishment.update(attributes)
      render json: { establishment: @establishment.as_json(except: [:created_at, :updated_at]) }, status: :ok
    else
      render json: { errors: "There was an issue with the attributes you tried to update." }, 
                    status: :unproccessable_entity
    end
  end

  def search
    @establishments = Establishment.where(nil) # creates an anonymous scope
    @establishments = @establishments.wifi(params[:wifi]) if params[:wifi].present?
    @establishments = @establishments.ambiance(params[:ambiance]) if params[:ambiance].present?
    @establishments = @establishments.price(params[:price]) if params[:price].present?
    @establishments = @establishments.coffee_quality(params[:coffee_quality]) if params[:coffee_quality].present?
    @establishments = @establishments.sample
    # @establishments = @establishments.page(params[:page]).per(params[:per])
    render json: @establishments, status: :ok
  end

  def delete
    @establishment = Establishment.find_by(id: params[:id])
    if @establishment.destroy
        render json: { message: "Establishment has been deleted." }, status: :no_content
    end
  end
  

  private 

  def set_attributes(params)
    attributes = { }
    list = [:name, :street_address, :city,
      :state, :zip_code]
    list.each do |l|
      if params[l]
        attributes.merge!(l => params[l])
      end
    end
    attributes
  end

  def update_ratings(params, establishment)
    updated_ratings = { }
    list = [:coffee_quality, :price, :ambiance, :wifi]
    list.each do |l|
      if params[l]
        new_rating = (establishment[l] + params[l].to_f)/2
        updated_ratings.merge!(l => new_rating)
      end
    end
    updated_ratings
  end

end